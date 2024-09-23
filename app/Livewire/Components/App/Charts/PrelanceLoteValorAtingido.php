<?php

namespace App\Livewire\Components\App\Charts;

use App\Charts\LotePrelanceValorAtingido;
use Livewire\Component;
use App\Models\Leilao;

class PrelanceLoteValorAtingido extends Component
{
    public Leilao $leilao;
    protected $columnChartModel;

    public function mount(Leilao $leilao)
    {
        $this->leilao = $leilao;
    }

    public function render(LotePrelanceValorAtingido $lotePrelanceValorAtingido)
    {
        return view('livewire.components.app.charts.prelance-lote-valor-atingido', [
            'chart' => $lotePrelanceValorAtingido->build($this->leilao)
        ]);
    }
}
