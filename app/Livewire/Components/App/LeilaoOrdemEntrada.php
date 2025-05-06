<?php

namespace App\Livewire\Components\App;

use App\Models\Leilao;
use Livewire\Component;

class LeilaoOrdemEntrada extends Component
{
    public $lotes = [];
    public $leilao;

    public function mount($leilao, $lotes)
    {
        $this->lotes = $lotes;
        $this->leilao = $leilao;
    }

    public function reorderLotes()
    {
//        $this->lotes = collect($this->lotes)->sortBy('ordem_entrada')->toArray();
//        $this->emit('leilaoOrdemEntradaUpdated', $this->leilao->id);
    }

    public function render()
    {
        return view('livewire.components.app.leilao-ordem-entrada');
    }
}
