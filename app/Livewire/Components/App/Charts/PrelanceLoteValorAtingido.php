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
        $lotePrelanceValorAtingidoBuild = $lotePrelanceValorAtingido->build($this->leilao);

        return view('livewire.components.app.charts.prelance-lote-valor-atingido', [
            'chartLotePrelanceValorAtingido'=> $lotePrelanceValorAtingidoBuild,
            'chartLotePrelanceValorAtingidoScripts' => $lotePrelanceValorAtingidoBuild->script()
        ]);
    }
}
