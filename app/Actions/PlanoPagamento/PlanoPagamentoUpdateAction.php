<?php

namespace App\Actions\PlanoPagamento;

use App\DTO\PlanoPagamento\PlanoPagamentoUpdateDTO;
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
        $planoPagamento->condicoes_pagamento()->saveMany($dto->condicoesPagamento);

        foreach($dto->condicoesPagamento as $condicaoPagamento)
        {
            $idsCondicoesPagamento[] = $condicaoPagamento->id;
        }

        $planoPagamento->condicoes_pagamento()->sync($idsCondicoesPagamento);

        $planoPagamentoUpdated = PlanoPagamento::where('uuid', $dto->uuid)
                                    ->with('condicoes_pagamento')
                                    ->first();

        dd($planoPagamentoUpdated);
    }
}