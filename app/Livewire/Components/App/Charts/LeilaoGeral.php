<?php

namespace App\Livewire\Components\App\Charts;

use App\Charts\LeilaoGeralChart;
use Livewire\Component;

class LeilaoGeral extends Component
{
    public function render(LeilaoGeralChart $chart)
    {
        $chartLeilaoGeral = $chart->build();
        return view('livewire.components.app.charts.leilao-geral', [
            'chartLeilaoGeral'=> $chartLeilaoGeral,
            'chartScripts' => $chartLeilaoGeral->script()
        ]);
    }
}
