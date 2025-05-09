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
        'condicao.percentual_comissao_comprador' => 'required|number',
        'condicao.incide_comissao_vendedor' => 'required',
        'condicao.incide_comissao_comprador' => 'required',
    ];

    public function render()
    {
        return view('livewire.components.app.plano-pagamento-condicoes-pagamento');
    }

    public function mount(array $condicoes = [])
    {
        $this->condicoes = $condicoes;
        $this->condicao = new CondicaoPagamento([
            'incide_comissao_vendedor' => true,
            'incide_comissao_comprador' => true
        ]);
    }

    public function add()
    {
        $this->errorMessage = '';
        if(
            is_null($this->condicao->descricao) ||
            is_null($this->condicao->repeticoes) ||
            is_null($this->condicao->qtd_parcelas) ||
            is_null($this->condicao->percentual_comissao_vendedor) ||
            is_null($this->condicao->percentual_comissao_comprador) ||
            is_null($this->condicao->incide_comissao_vendedor) ||
            is_null($this->condicao->incide_comissao_comprador)
        ) {
            $this->errorMessage = 'Preencha o formulário corretamente para continuar';
            return false;
        }

        $this->condicoes[] = [
            'descricao' => $this->condicao->descricao,
            'repeticoes' => $this->condicao->repeticoes,
            'qtd_parcelas' => $this->condicao->qtd_parcelas,
            'percentual_comissao_vendedor' => $this->condicao->percentual_comissao_vendedor,
            'percentual_comissao_comprador' => $this->condicao->percentual_comissao_comprador,
            'incide_comissao_vendedor' => $this->condicao->incide_comissao_vendedor,
            'incide_comissao_comprador' => $this->condicao->incide_comissao_comprador
        ];

        $this->condicao = new CondicaoPagamento([
            'incide_comissao_vendedor' => true,
            'incide_comissao_comprador' => true
        ]);
        $this->errorMessage = '';
    }

    public function default()
    {
        return true;
    }

    public function remove(int $index)
    {
        array_splice($this->condicoes, $index, 1);
        $this->errorMessage = '';
    }
}
