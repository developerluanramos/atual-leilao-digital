<?php

namespace App\DTO\PlanoPagamento;

use App\Http\Requests\App\PlanoPagamento\PlanoPagamentoDeleteRequest;

class PlanoPagamentoDeleteDTO
{
    public function __construct(
        public string $uuid
    ) {}

    public static function makeFromRequest(PlanoPagamentoDeleteRequest $request): self
    {
        return new self(
            $request->uuid
        );
    }
}