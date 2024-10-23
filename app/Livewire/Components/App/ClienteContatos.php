<?php

namespace App\Livewire\Components\App;

use App\Models\Contato;
use Livewire\Component;

class ClienteContatos extends Component
{
    public array $contatos;
    public Contato $contato;
    public $errorMessage = '';

    protected $rules = [
        'contato.nome' => 'required|string',
        'contato.valor' => 'required|string',
        'contato.descricao' => 'required|string'
    ];

    public function render()
    {
        return view('livewire.components.app.cliente-contatos');
    }

    public function mount(array $contatos = [])
    {
        $this->contatos = $contatos;
        $this->contato = new Contato([]);
    }

    public function add()
    {
        $this->errorMessage = '';
        if(
            is_null($this->contato->nome) ||
            is_null($this->contato->valor) ||
            is_null($this->contato->descricao)
        ) {
            $this->errorMessage = 'Preencha o formulário corretamente para continuar';
            return false;
        }

        $this->contatos[] = [
            'nome' => $this->contato->nome,
            'valor' => $this->contato->valor,
            'descricao' => $this->contato->descricao,
        ];

        $this->contato = new Contato([]);
        $this->errorMessage = '';
    }

    public function default()
    {
        return true;
    }

    public function remove(int $index)
    {
        array_splice($this->contatos, $index, 1);
        $this->errorMessage = '';
    }
}
