<?php

namespace App\Charts;

use App\Models\Lote;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LotePrelanceValorAtingido
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(string $leilaoUuid = null): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        $lotes = Lote::all();

        return $this->chart->horizontalBarChart()
            ->setHeight(900)
            ->setTitle('valor estimado x Valor atingido')
            ->addData('Valor Estimado', $lotes->pluck('valor_estimado')->toArray())
            ->addData('Valor Atingido', $lotes->pluck('valor_prelance')->toArray())
            ->setXAxis($lotes->pluck('id')->toArray());
    }
}
