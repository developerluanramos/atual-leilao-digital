<?php

namespace App\Livewire\Components\App\Charts;

use App\Models\Leilao;
use Livewire\Component;
use App\Charts\LeilaoGenero as ChartLeilaoGenero;

class LeilaoGenero extends Component
{
    public Leilao $leilao;
    protected $columnChartModel;

    public function mount(Leilao $leilao)
    {
        $this->leilao = $leilao;
    }

    public function render(ChartLeilaoGenero $chartLeilaoGenero)
    {
        $chartLeilaoGenero = $chartLeilaoGenero->build($this->leilao);

        return view('livewire.components.app.charts.leilao-genero', [
            'chartLeilaoGenero'=> $chartLeilaoGenero,
            'chartScripts' => $chartLeilaoGenero->script()
        ]);
    }
}
