<?php

namespace App\Charts;

use App\Models\Leilao;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LotePrelanceRadial
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(Leilao $leilao): \ArielMejiaDev\LarapexCharts\RadarChart
    {
        $lotes = $leilao->lotes()->get();
        $labels = [];
        foreach($lotes->pluck('numero')->toArray() as $numero) {
            array_push($labels, 'Lote '.$numero);
        }
        return $this->chart->radarChart()
            ->addData('Quantidade de lances', $lotes->pluck('quantidade_prelances')->toArray())
            ->setToolbar(true, true)
            ->setHeight(700)
            ->setXAxis($labels)
            ->setMarkers(['#303F9F'], 7, 10);
    }
}
