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
        $this->chart = $chart;
    }

    public function build(Leilao $leilao): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $lotes = $leilao->lotes()->get();
        $qtdLotesFechados = $lotes->where('status', (string)StatusLoteEnum::FECHADO)->count();
        $qtdLotesAbertos = $lotes->where('status', (string)StatusLoteEnum::ABERTO)->count();
        // dd($qtdLotesFechados, $qtdLotesAbertos);
        return $this->chart->donutChart()
            ->setDataLabels(true)
            ->setTitle('Lotes fechados x abertos')
            ->setColors(['#58d68d', '#c0392b'])
            ->setSubtitle('')
            ->addData([$qtdLotesFechados, $qtdLotesAbertos])
            ->setLabels(['Fechados', 'Abertos']);
    }
}