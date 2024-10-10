<?php

namespace App\DTO\PlanoPagamento;

use App\Http\Requests\App\PlanoPagamento\PlanoPagamentoEditRequest;

class PlanoPagamentoEditDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(PlanoPagamentoEditRequest $request): self
    {
        return new self(
            $request->uuid
        );
    } 
}