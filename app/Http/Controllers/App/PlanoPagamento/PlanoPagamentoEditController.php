<?php

namespace App\Http\Controllers\App\PlanoPagamento;

use App\Actions\PlanoPagamento\PlanoPagamentoEditAction;
use App\DTO\PlanoPagamento\PlanoPagamentoEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\PlanoPagamento\PlanoPagamentoEditRequest;

class PlanoPagamentoEditController extends Controller
{
    public function __construct(
        protected PlanoPagamentoEditAction $editAction
    ) { }

    public function edit(PlanoPagamentoEditRequest $request)
    {
        $planoPagamento = $this->editAction->exec(PlanoPagamentoEditDTO::makeFromRequest($request));

        $condicoesPagamento = [];
        
        foreach($planoPagamento->condicoes_pagamento as $condicao)
        {
            $condicoesPagamento[] = [
                'descricao' => $condicao->descricao,
                'repeticoes' => $condicao->repeticoes,
                'qtd_parcelas' => $condicao->qtd_parcelas,
                'percentual_comissao_vendedor' => $condicao->percentual_comissao_vendedor,
                'percentual_comissao_comprador' => $condicao->percentual_comissao_comprador,
                'incide_comissao_vendedor' => $condicao->incide_comissao_vendedor,
                'incide_comissao_comprador' => $condicao->incide_comissao_comprador
            ];
        }

        return view('app.plano-pagamento.edit',compact('planoPagamento', 'condicoesPagamento'));
    }
}