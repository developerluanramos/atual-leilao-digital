<?php

namespace App\Livewire\Components\App;

use App\Models\CondicaoPagamento;
use Livewire\Component;

class PlanoPagamentoCondicoesPagamento extends Component
{
    public array $condicoes;
    public CondicaoPagamento $condicao;
    public $errorMessage = '';
    
    protected $rules = [
        'condicao.descricao' => 'required|string',
        'condicao.repeticoes' => 'required|number',
        'condicao.qtd_parcelas' => 'required|number',
        'condicao.percentual_comissao_vendedor' => 'required|number',
        'condicao.percentual_comissao_comprador' => 'required|number'
    ];

    public function render()
    {
        return view('livewire.components.app.plano-pagamento-condicoes-pagamento');
    }

    public function mount()
    {
        $this->condicoes = [];
        $this->condicao = new CondicaoPagamento();
    }

    public function add()
    {
        $this->errorMessage = '';
        if(
            is_null($this->condicao->descricao)
        ) {
            $this->errorMessage = 'Preencha o formulário corretamente para continuar';
            return false;
        }

        $this->condicoes[] = [
            'descricao' => $this->condicao->descricao,
        ];
        $this->condicao = new CondicaoPagamento();
        $this->errorMessage = '';
    }

    public function default()
    {
        return true;
    }
}
