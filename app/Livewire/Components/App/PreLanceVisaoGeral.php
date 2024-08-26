<?php

namespace App\Livewire\Components\App;

use App\Models\Leilao;
use Livewire\Component;

class PreLanceVisaoGeral extends Component
{
    public Leilao $leilao;
    public $lotesLanceVencedor;

    public function mount(Leilao $leilao)
    {
        $this->leilao = $leilao;
    }

    public function render()
    {
        return view('livewire.components.app.pre-lance-visao-geral');
    }
}
