<?php

namespace App\Charts;

use App\Models\Leilao;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LotePrelancePercentual
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(Leilao $leilao): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $lotes = $leilao->lotes()->get();
        $labels = [];
        foreach($lotes->pluck('numero')->toArray() as $numero) {
            array_push($labels, 'Lote '.$numero);
        }
        return $this->chart->pieChart()
            ->addData($lotes->pluck('valor_prelance')->toArray())
            ->setToolbar(true, true)
            ->setLabels($labels)
            ->setXAxis($labels);
    }
}
