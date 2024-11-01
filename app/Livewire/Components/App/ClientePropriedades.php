<?php

namespace App\Livewire\Components\App;

use App\Models\Propriedade;
use Livewire\Component;

class ClientePropriedades extends Component
{
    public array $propriedades;
    public Propriedade $propriedade;
    public $errorMessage = '';

    protected $rules = [
        'propriedade.nome' => 'required|string',
        'propriedade.municipio_localidade' => 'required|string',
        'propriedade.logradouro' => 'required|string',
        'propriedade.cep_rural' => 'required|string',
        'propriedade.numero' => 'required|string',
        'propriedade.telefone_celular' => 'required|string'
    ];

    public function render()
    {
        return view('livewire.components.app.cliente-propriedades');
    }

    public function mount(array $propriedades = [])
    {
        $this->propriedades = $propriedades;
        $this->propriedade = new Propriedade([]);
    }

    public function add()
    {
        $this->errorMessage = '';
        if(
            is_null($this->propriedade->nome) ||
            is_null($this->propriedade->municipio_localidade) ||
            is_null($this->propriedade->logradouro) ||
            is_null($this->propriedade->cep_rural) ||
            is_null($this->propriedade->numero) ||
            is_null($this->propriedade->telefone_celular)
        ) {
            $this->errorMessage = 'Preencha o formulário corretamente para continuar';
            return false;
        }

        $this->propriedades[] = [
            'nome' => $this->propriedade->nome,
            'municipio_localidade' => $this->propriedade->municipio_localidade,
            'logradouro' => $this->propriedade->logradouro,
            'cep_rural' => $this->propriedade->cep_rural,
            'numero' => $this->propriedade->numero,
            'telefone_celular' => $this->propriedade->telefone_celular,
        ];

        $this->propriedade = new Propriedade([]);
        $this->errorMessage = '';
    }

    public function default()
    {
        return true;
    }

    public function remove(int $index)
    {
        array_splice($this->propriedades, $index, 1);
        $this->errorMessage = '';
    }
}
