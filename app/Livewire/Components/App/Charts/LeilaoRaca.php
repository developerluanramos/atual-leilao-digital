<?php

namespace App\Livewire\Components\App\Charts;

use App\Models\Leilao;
use Livewire\Component;
use App\Charts\LeilaoRaca as ChartLeilaoRaca;


class LeilaoRaca extends Component
{
    public Leilao $leilao;
    protected $columnChartModel;

    public function mount(Leilao $leilao)
    {
        $this->leilao = $leilao;
    }

    public function render(ChartLeilaoRaca $chartLeilaoRaca)
    {
        $chartLeilaoRaca = $chartLeilaoRaca->build($this->leilao);

        return view('livewire.components.app.charts.leilao-raca', [
            'chartLeilaoRaca'=> $chartLeilaoRaca,
            'chartScripts' => $chartLeilaoRaca->script()
        ]);
    }
}
