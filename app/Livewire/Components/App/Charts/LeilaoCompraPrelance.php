<?php

namespace App\Livewire\Components\App\Charts;

use App\Charts\LeilaoCompraPrelance as ChartsLeilaoCompraPrelance;
use App\Models\Leilao;
use Livewire\Component;

class LeilaoCompraPrelance extends Component
{
    public Leilao $leilao;
    protected $columnChartModel;

    public function mount(Leilao $leilao)
    {
        $this->leilao = $leilao;
    }

    public function render(ChartsLeilaoCompraPrelance $leilaoCompraPrelance)
    {
        $chartLeilaoCompraPrelance = $leilaoCompraPrelance->build($this->leilao);

        return view('livewire.components.app.charts.leilao-compra-prelance', [
            'chartLeilaoCompraPrelance'=> $chartLeilaoCompraPrelance,
            'chartScripts' => $chartLeilaoCompraPrelance->script()
        ]);
    }
}