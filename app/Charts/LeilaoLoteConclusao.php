<?php

namespace App\Charts;

use App\Enums\StatusLoteEnum;
use App\Models\Leilao;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LeilaoLoteConclusao
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $chart->setDataLabels(true);
        $chart->setLabels(['Label 1', 'Label 2']);
        $this->chart = $chart;
    }

    public function build(Leilao $leilao): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $lotes = $leilao->lotes()->get();
        $qtdLotesFechados = $lotes->where('status', (string)StatusLoteEnum::FECHADO)->count();
        $qtdLotesAbertos = $lotes->where('status', (string)StatusLoteEnum::ABERTO)->count();

        return $this->chart->barChart()
            ->addData("name", [$qtdLotesFechados, $qtdLotesAbertos])
            ->setLabels(['Lotes Fechados', 'Lotes Abertos'])
            ->setTitle('Lotes fechados x abertos')
            ->setColors(['#58d68d', '#c0392b'])
            ->setSubtitle('')
            ->setToolbar(true, true)
            // '->setTheme('light')
            ->setHeight(200);
    }
}
