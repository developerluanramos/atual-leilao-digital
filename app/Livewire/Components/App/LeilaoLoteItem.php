<?php

namespace App\Livewire\Components\App;

use App\Models\LoteItem;
use Livewire\Component;

class LeilaoLoteItem extends Component
{
    public $errorMessage = '';
    public array $itens;
    public array $formData;
    public LoteItem $item;

    protected $rules = [
        'item.descricao' => 'required|string',
        'item.especie_uuid' => 'required|string',
        'item.raca_uuid' => 'required|string'
    ];

    public function mount(array $formData)
    {
        $this->item = new LoteItem();
        $this->formData = $formData;
    }

    public function render()
    {
        return view('livewire.components.app.leilao-lote-item', ['formData' => $this->formData]);
    }

    public function add()
    {
        if(
            is_null($this->item->descricao)
            || is_null($this->item->especie_uuid)
            || is_null($this->item->raca_uuid)
        ) {
            $this->errorMessage = 'Preencha o formulário corretamente para continuar';
            return false;
        }

        $this->itens[] = [
            'descricao' => $this->item->descricao,
            'especie_uuid' => $this->item->especie_uuid,
            'raca_uuid' => $this->item->raca_uuid
        ];
        $this->item = new LoteItem();
        $this->errorMessage = '';
    }

    public function remove(int $index)
    {
        error_log('TESTE TESTE '.$index);
        array_splice($this->itens, $index, 1);
        $this->errorMessage = '';
    }

    public function default()
    {
        return true;
    }
}
