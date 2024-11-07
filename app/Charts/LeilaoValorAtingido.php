<?php

namespace App\Charts;

use App\Models\Leilao;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LeilaoValorAtingido
{
    protected $chartLeilaoValorAtingido;

    public function __construct(LarapexChart $chart)
    {
        $this->chartLeilaoValorAtingido = $chart;
    }

    public function build(Leilao $leilao): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $lotes = $leilao->lotes()->get();
        $compras = [];

        foreach($lotes as $index => $lote) {
            $valorCompra = 0;

            if($lote->compras()->exists()) {
                $valorCompra = $lote->compras()->sum('valor');
            }

            array_push($compras, $valorCompra);
        }

        return $this->chartLeilaoValorAtingido->barChart()
            ->addData('Valor Estimado', $lotes->pluck('valor_estimado')->toArray())
            ->addData('Valor Pré-lance', $lotes->pluck('valor_prelance')->toArray())
            ->addData('Valor Arrematado', $compras)
            ->setHeight(400)
            ->setToolbar(true, true)
            ->setTitle('Gráfico comparativo de valor atingido')
            ->setSubtitle('Evidencía os comparativos entre o valor estimado para o lote, o valor atingido no pré-lance e o valor fechado no arremate do lote')
            ->setXAxis($lotes->pluck('id')->toArray());
    }
}
