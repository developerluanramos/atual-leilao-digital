<?php

namespace App\Actions\PlanoPagamento;

use App\DTO\PlanoPagamento\PlanoPagamentoEditDTO;
use App\Models\PlanoPagamento;

class PlanoPagamentoEditAction
{
    public function __construct() { }

    public function exec(PlanoPagamentoEditDTO $dto)
    {
        $planoPagamento = PlanoPagamento::where('uuid', $dto->uuid)
                            ->with('condicoes_pagamento')
                            ->first();
        
        dd($planoPagamento);

        return $planoPagamento;
    }
}