<?php

namespace App\Livewire\Components\App\Charts;

use App\Charts\LotePrelanceRadial as ChartsLotePrelanceRadial;
use App\Models\Leilao;
use Livewire\Component;

class LotePrelanceRadial extends Component
{
    public Leilao $leilao;
    protected $columnChartModel;

    public function mount(Leilao $leilao)
    {
        $this->leilao = $leilao;
    }

    public function render(ChartsLotePrelanceRadial $lotePrelanceRadial)
    {
        return view('livewire.components.app.charts.lote-prelance-radial', [
            'chart'=> $lotePrelanceRadial->build($this->leilao)
        ]);
    }
}
