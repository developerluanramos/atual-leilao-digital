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

    public function build(Leilao $leilao): \ArielMejiaDev\LarapexCharts\DonutChart
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
        
        return $this->chart->donutChart()
            ->setDataLabels(true)
            ->setTitle('Com pré-lance x Sem pré-lance')
            ->setColors(['#58d68d', '#c0392b'])
            ->setSubtitle('')
            ->addData([$qtdLoteComPrelanceVencedor, $qtdLoteSemPrelanceVencedor])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
            // ->setLabels(['Fechados', 'Abertos']);
    }
}
