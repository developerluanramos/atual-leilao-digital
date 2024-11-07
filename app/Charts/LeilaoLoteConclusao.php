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

        return $this->chart->donutChart()
            ->setDataLabels(true)
            ->setTitle('Lotes fechados x abertos')
            ->setColors(['#58d68d', '#c0392b'])
            ->setSubtitle('')
            ->setToolbar(true, true)
            ->setTheme('dark')
            ->setHeight(200)
            ->setOptions([
                'labels' => ['Label 1', 'Label 2'], // Manually set labels
                'dataLabels' => ['enabled' => true] // Ensure data labels are enabled
            ])
            ->addData([$qtdLotesFechados, $qtdLotesAbertos]);
    }
}