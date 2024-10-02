<?php

namespace App\DTO\PlanoPagamento;

use App\Http\Requests\App\PlanoPagamento\PlanoPagamentoStoreRequest;
use App\Models\CondicaoPagamento;

class PlanoPagamentoStoreDTO
{
    public function __construct(
        public string $nome,
        public string $descricao,
        public array $condicoesPagamento
    )
    { }

    public static function makeFromRequest(PlanoPagamentoStoreRequest $request): self
    {
        $condicoesPagamentoArray = json_decode($request->get('condicoes_pagamento'));
        
        $condicoesPagamento = [];
        
        foreach($condicoesPagamentoArray as $condicao) {
            $condicoesPagamento[] = new CondicaoPagamento((array) $condicao);
        }

        return new self(
            $request->get('nome'),
            $request->get('descricao'),
            $condicoesPagamento
        );
    } 
}