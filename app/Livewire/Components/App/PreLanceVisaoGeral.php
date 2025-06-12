<?php

namespace App\Livewire\Components\App;

use App\Models\Leilao;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PreLanceVisaoGeral extends Component
{
    public Leilao $leilao;
    public $lotesLanceVencedor;
    public $clientesVencedores;

    public $vendedores;

    public function mount(Leilao $leilao)
    {
        set_time_limit(500);

        $this->leilao = $leilao;

        $this->vendedores = $leilao->lotes()
            ->with('vendedores')
            ->get()
            ->pluck('vendedores')
            ->flatten()
            ->unique('id');
    }

    public function render()
    {
        return view('livewire.components.app.pre-lance-visao-geral');
    }
}
