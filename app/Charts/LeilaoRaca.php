<?php

namespace App\Charts;

use App\Models\Leilao;
use App\Models\LoteItem;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LeilaoRaca
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(Leilao $leilao): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $racaQuantities = LoteItem::join('lote', 'lote_item.lote_uuid', '=', 'lote.uuid')
            ->join('leilao', 'lote.leilao_uuid', '=', 'leilao.uuid')
            ->join('raca', 'lote_item.raca_uuid', '=', 'raca.uuid')
            ->selectRaw('SUBSTRING(raca.nome, 1, 10) as nome, lote_item.raca_uuid, COUNT(*) as quantidade')
            ->groupBy('lote_item.raca_uuid')
            ->orderBy('lote_item.raca_uuid')
            ->where('leilao_uuid', $leilao->uuid)
            ->get()->toArray();

        return $this->chart->barChart()
            ->setTitle('Raças')
            ->addData("", array_column($racaQuantities, "quantidade"))
            ->setHeight(200)
            ->setToolbar(true, true)
            ->setLabels(array_column($racaQuantities, "nome"));
    }
}
