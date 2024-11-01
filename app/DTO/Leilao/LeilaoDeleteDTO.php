<?php

namespace App\DTO\Leilao;

use App\Http\Requests\App\Leilao\LeilaoDeleteRequest;

class LeilaoDeleteDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(LeilaoDeleteRequest $request): self
    {
        return new self(
            $request->uuid
        );
    }
}