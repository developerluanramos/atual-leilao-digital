<?php

namespace App\Charts;

use App\Models\Leilao;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LeilaoCompraPrelance
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(Leilao $leilao): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $lotes = $leilao->lotes()->get();
        $qtdLoteComPrelanceVencedor = 0;
        $qtdLoteSemPrelanceVencedor = 0;
        foreach($lotes as $index => $lote) {
            // $lote->has('lance_vencedor')->count());
            if($lote->prelance_vencedor()) {
                $qtdLoteComPrelanceVencedor++;
            } else {
                $qtdLoteSemPrelanceVencedor++;
            }
        }

        return $this->chart->barChart()
            ->addData("", [$qtdLoteComPrelanceVencedor, $qtdLoteSemPrelanceVencedor])
            ->setLabels(['Com pré-lance', 'Sem pré-lance'])
            ->setTitle('Com pré-lance x Sem pré-lance')
            ->setColors(['#58d68d', '#c0392b'])
            ->setHeight(200)
            ->setToolbar(true, true)
            ->setSubtitle('')
            ->setXAxis(['Com pré-lance', 'Sem pré-lance']);
            // ->setLabels(['Fechados', 'Abertos']);
    }
}
