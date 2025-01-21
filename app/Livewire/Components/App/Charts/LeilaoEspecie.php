<?php

namespace App\Livewire\Components\App\Charts;

use Livewire\Component;
use App\Charts\LeilaoEspecie as ChartLeilaoEspecie;
use App\Models\Leilao;

class LeilaoEspecie extends Component
{
    public Leilao $leilao;
    protected $columnChartModel;

    public function mount(Leilao $leilao)
    {
        $this->leilao = $leilao;
    }

    public function render(ChartLeilaoEspecie $chartLeilaoEspecie)
    {
        $chartLeilaoEspecie = $chartLeilaoEspecie->build($this->leilao);

        return view('livewire.components.app.charts.leilao-especie', [
            'chartLeilaoEspecie'=> $chartLeilaoEspecie,
            'chartScripts' => $chartLeilaoEspecie->script()
        ]);
    }
}
