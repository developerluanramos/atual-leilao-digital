<?php

namespace App\Actions\PlanoPagamento;

use App\DTO\PlanoPagamento\PlanoPagamentoStoreDTO;
use App\Models\PlanoPagamento;

class PlanoPagamentoStoreAction
{
    public function __construct() { }

    public function exec(PlanoPagamentoStoreDTO $dto): PlanoPagamento
    {
        $planoPagamento = PlanoPagamento::create([
            'nome' => $dto->nome,
            'descricao' => $dto->descricao
        ]);

        $planoPagamento->condicoes_pagamento()->saveMany($dto->condicoesPagamento);

        return $planoPagamento;
    }
}