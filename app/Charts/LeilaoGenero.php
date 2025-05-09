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

    public function build(Leilao $leilao): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $quantidadeMacho = $leilao->lotes()->sum('quantidade_macho');
        $quantidadeFemea = $leilao->lotes()->sum('quantidade_femea');
        $quantidadeOutro = $leilao->lotes()->sum('quantidade_outro');

        return $this->chart->barChart()
            ->setTitle('Gêneros')
            ->addData("", [(int)$quantidadeMacho, (int)$quantidadeFemea, (int)$quantidadeOutro])
            ->setHeight(200)
            ->setToolbar(true, true)
            ->setLabels(['Machos', 'Fêmeas', 'Outros']);
    }
}
