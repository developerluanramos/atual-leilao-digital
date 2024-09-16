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

        // $this->columnChartModel = (new MultiColumnChartModel())
        //     ->setTitle('Expenses by Type')
        //     ->addSeriesColumn(['Food', 'Teste'], [100, 120], ['#f6ad55', '#fc8181'])
        //     ->addSeriesColumn(['Shopping', 'teste'], [200, 222], ['#fc8181', '#f6ad55']);
    }

    public function render(LotePrelanceValorAtingido $lotePrelanceValorAtingido)
    {
        return view('livewire.components.app.charts.prelance-lote-valor-atingido', ['chart' => $lotePrelanceValorAtingido->build()]);
    }
}
