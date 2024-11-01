<?php

namespace App\Livewire\Components\App\Charts;

use App\Models\Leilao;
use Livewire\Component;

class LeilaoLoteConclusao extends Component
{
    public Leilao $leilao;
    protected $columnChartModel;

    public function mount(Leilao $leilao)
    {
        $this->leilao = $leilao;
    }
    public function render(\App\Charts\LeilaoLoteConclusao $chartLeilaoLoteConclusao)
    {
        return view('livewire.components.app.charts.leilao-lote-conclusao', [
            'chart'=> $chartLeilaoLoteConclusao->build($this->leilao)
        ]);
    }
}