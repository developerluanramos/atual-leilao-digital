<?php

namespace App\DTO\PlanoPagamento;

use App\Models\CondicaoPagamento;
use Illuminate\Http\Request;

class PlanoPagamentoStoreDTO
{
    public function __construct(
        public string $nome,
        public string $descricao,
        public array $condicoesPagamento
    )
    { }

    public static function makeFromRequest(Request $request): self
    {
        $condicoesPagamentoArray = json_decode($request->get('condicoes_pagamento'));
        
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