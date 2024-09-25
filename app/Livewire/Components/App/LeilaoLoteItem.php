<?php

namespace App\Livewire\Components\App;

use App\Enums\GeneroLoteItemEnum;
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
        'item.raca_uuid' => 'required|string',
        'item.valor_estimado' => 'required|number',
        'item.genero' => 'required|number',
    ];

    public function mount(array $formData)
    {
        $this->itens = [];
        $this->item = new LoteItem();
        $this->item->valor_estimado = 0;
//        $this->item->genero = GeneroLoteItemEnum::MACHO;
        $this->formData = $formData;
    }

    public function render()
    {
        return view('livewire.components.app.leilao-lote-item');
    }

    public function add()
    {
        $this->errorMessage = '';
        if(
            is_null($this->item->descricao)
            || is_null($this->item->especie_uuid)
            || is_null($this->item->raca_uuid)
            || is_null($this->item->genero)
        ) {
            $this->errorMessage = 'Preencha o formulário corretamente para continuar';
            return false;
        }

        $this->itens[] = [
            'descricao' => $this->item->descricao,
            'especie_uuid' => $this->item->especie_uuid,
            'raca_uuid' => $this->item->raca_uuid,
            'valor_estimado' => $this->item->valor_estimado,
            'genero' => $this->item->genero,
        ];
        $this->item = new LoteItem();
        $this->errorMessage = '';
    }

    public function remove(int $index)
    {
        array_splice($this->itens, $index, 1);
        $this->errorMessage = '';
    }

    public function default()
    {
        return true;
    }

    public function getValorTotalProperty()
    {
        return array_sum(array_column($this->itens, 'valor_estimado'));
    }

    public function getQuantidadeMachoProperty()
    {
        return count(array_filter($this->itens, function ($n) {
            return (int)$n['genero'] == GeneroLoteItemEnum::MACHO;
        }));
    }

    public function getQuantidadeFemeaProperty()
    {
        return count(array_filter($this->itens, function ($n) {
            return (int)$n['genero'] == GeneroLoteItemEnum::FEMEA;
        }));
    }

    public function getQuantidadeOutroProperty()
    {
        return count(array_filter($this->itens, function ($n) {
            return (int)$n['genero'] == GeneroLoteItemEnum::OUTRO;
        }));
    }
}
