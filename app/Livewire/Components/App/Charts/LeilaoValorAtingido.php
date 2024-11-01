<?php

namespace App\Livewire\Components\App\Charts;

use App\Charts\LeilaoValorAtingido as ChartsLeilaoValorAtingido;
use App\Models\Leilao;
use Livewire\Component;

class LeilaoValorAtingido extends Component
{
    public Leilao $leilao;
    protected $columnChartModel;

    public function mount(Leilao $leilao)
    {
        $this->leilao = $leilao;
    }

    public function render(ChartsLeilaoValorAtingido $chartsLeilaoValorAtingido)
    {
        return view('livewire.components.app.charts.leilao-valor-atingido', [
            'chart'=> $chartsLeilaoValorAtingido->build($this->leilao),
            'chart2'=> $chartsLeilaoValorAtingido->build($this->leilao)
        ]);
    }
}
