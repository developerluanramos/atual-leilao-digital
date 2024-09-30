<?php

namespace App\Actions\PlanoPagamento;

use App\Models\CondicaoPagamento;
use App\Repositories\PlanoPagamento\PlanoPagamentoRepositoryInterface;

class PlanoPagamentoDeleteAction
{
    public function __construct(
        protected PlanoPagamentoRepositoryInterface $repository
    ) { }

    public function exec(string $uuid): void
    {
        $planoPagamento = $this->repository->find($uuid);
        // $condicoesPagamento = CondicaoPagamento::where('plano_pagamento_uuid', $uuid)->get();
        // $condicoesPagamento->delete();
        $planoPagamento->delete();
    }
}