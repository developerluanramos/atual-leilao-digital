<?php

namespace App\Actions\PlanoPagamento;

use App\Models\PlanoPagamento;
use Illuminate\Http\Request;

class PlanoPagamentoStoreAction
{
    public function __construct() { }

    public function exec(Request $request): PlanoPagamento
    {
        $planoPagamento = PlanoPagamento::create([
            'nome' => $request->get('nome'),
            'descricao' => $request->get('descricao')
        ]);

        $condicoesPagamentoArray = json_decode($request->get('condicoes_pagamento'));
        
        foreach($condicoesPagamentoArray as $key => $condicoes) {
            $condicoesPagamento = [
                "descricao" => $condicoes->descricao,
                "repeticoes" => $condicoes->repeticoes,
                "qtd_parcelas" => $condicoes->qtd_parcelas,
                "percentual_comissao_vendedor" => $condicoes->percentual_comissao_vendedor,
                "percentual_comissao_comprador" => $condicoes->percentual_comissao_comprador,
                "incide_comissao_vendedor" => $condicoes->incide_comissao_vendedor,
                "incide_comissao_comprador" => $condicoes->incide_comissao_comprador,
            ];

            $arrayCondicoesPagamento[$key] = $condicoesPagamento;
        }

        $condicoesPagamento = $planoPagamento->condicoes_pagamento()->createMany($arrayCondicoesPagamento);

        return $planoPagamento;
    }
}