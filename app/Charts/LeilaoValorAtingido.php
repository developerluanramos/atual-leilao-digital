<?php

namespace App\Charts;

use App\Models\Leilao;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LeilaoValorAtingido
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(Leilao $leilao): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $lotes = $leilao->lotes()->get();

        return $this->chart->barChart()
            ->addData('Valor Estimado', $lotes->pluck('valor_estimado')->toArray())
            ->addData('Valor Pré-lance', $lotes->pluck('valor_prelance')->toArray())
            ->addData('Valor Arrematado', [])
            ->setHeight(400)
            ->setTitle('Gráfico comparativo de valor atingido')
            ->setSubtitle('Evidencía os comparativos entre o valor estimado para o lote, o valor atingido no pré-lance e o valor fechado no arremate do lote')
            ->setXAxis($lotes->pluck('id')->toArray());
    }
}
