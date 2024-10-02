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

        foreach($planoPagamento->condicoes_pagamento as $condicao)
        {
            $idsCondicoesPagamento[] = $condicao->id;
        }

        $planoPagamento->update((array) $dto);
        $planoPagamento->condicoes_pagamento()->saveMany($dto->condicoesPagamento);

        CondicaoPagamento::destroy($idsCondicoesPagamento);

        $planoPagamentoUpdated = PlanoPagamento::where('uuid', $dto->uuid)
                                    ->with('condicoes_pagamento')
                                    ->first();

        return $planoPagamentoUpdated;
    }
}