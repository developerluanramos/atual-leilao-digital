<?php

namespace App\Charts;

use App\Models\Leilao;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LeilaoGenero
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(Leilao $leilao): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $quantidadeMacho = $leilao->lotes()->sum('quantidade_macho');
        $quantidadeFemea = $leilao->lotes()->sum('quantidade_femea');
        $quantidadeOutro = $leilao->lotes()->sum('quantidade_outro');
        
        return $this->chart->pieChart()
            ->setTitle('Gêneros')
            ->addData([(int)$quantidadeMacho, (int)$quantidadeFemea, (int)$quantidadeOutro])
            ->setHeight(175)
            ->setToolbar(true, true)
            ->setLabels(['Machos', 'Fêmeas', 'Outros']);
    }
}
