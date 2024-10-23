<?php

namespace App\DTO\Leilao\Lote;

use App\Http\Requests\App\Leilao\Lote\LoteDeleteRequest;

class LoteDeleteDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(LoteDeleteRequest $request): self
    {
        return new self(
            $request->uuid
        );
    }
}