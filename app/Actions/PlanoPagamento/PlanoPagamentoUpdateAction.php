<?php

namespace App\Actions\PlanoPagamento;

use App\DTO\PlanoPagamento\PlanoPagamentoUpdateDTO;
use App\Models\CondicaoPagamento;
use App\Models\PlanoPagamento;

class PlanoPagamentoUpdateAction
{
    public function __construct() { }

    public function exec(PlanoPagamentoUpdateDTO $dto)
    {
        $planoPagamento = PlanoPagamento::where('uuid', $dto->uuid)
                            ->with('condicoes_pagamento')
                            ->first();

        $planoPagamento->update((array) $dto);

        CondicaoPagamento::destroy($planoPagamento->condicoes_pagamento()->pluck('id'));

        $planoPagamento->condicoes_pagamento()->saveMany($dto->condicoesPagamento);

        return $planoPagamento;
    }
}