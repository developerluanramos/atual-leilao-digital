<?php

namespace App\Livewire\Components\App\Charts;

use App\Charts\LotePrelancePercentual as ChartsLotePrelancePercentual;
use App\Models\Leilao;
use Livewire\Component;

class LotePrelancePercentual extends Component
{
    public Leilao $leilao;
    protected $columnChartModel;

    public function mount(Leilao $leilao)
    {
        $this->leilao = $leilao;
    }
    public function render(ChartsLotePrelancePercentual $chartsLotePrelancePercentual)
    {
        return view('livewire.components.app.charts.lote-prelance-percentual', [
            'chart'=> $chartsLotePrelancePercentual->build($this->leilao)
        ]);
    }
}
