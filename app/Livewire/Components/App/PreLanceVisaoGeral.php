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

        foreach ($this->leilao->lotes as $lote)
        {
            $this->lotesLanceVencedor[] = [
                "lote" => $lote->uuid,
                "numero" => $lote->id,
                "quantidade" => $lote->itens->count(),
                "numeroLote" => $lote->id,
                "maiorLance" => max(array_column($lote->lances->toArray(),'valor')),
                "config" => $leilao->config_prelance,
                "cliente" => "Nome do cliente"
            ];
        }
    }

    public function render()
    {
        return view('livewire.components.app.pre-lance-visao-geral');
    }
}
