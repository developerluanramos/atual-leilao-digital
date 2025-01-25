<?php

namespace App\Charts;

use App\Models\Leilao;
use App\Models\Lote;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LotePrelanceValorAtingido
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(Leilao $leilao): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $lotes = $leilao->lotes()->get();
        $labels = [];
        foreach($lotes->pluck('numero')->toArray() as $numero) {
            array_push($labels, 'Lote '.$numero);
        }
        return $this->chart->barChart()
            ->addData('Valor Estimado', $lotes->pluck('valor_estimado')->toArray())
            ->addData('Valor Atingido', $lotes->pluck('valor_prelance')->toArray())
            ->setToolbar(true, true)
            ->setTitle('valor estimado x Valor atingido')
            ->setXAxis($labels);
    }
}
