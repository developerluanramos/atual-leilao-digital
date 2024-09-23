<?php

namespace App\DTO\Pisteiro;

use App\Http\Requests\App\Pisteiro\PisteiroDeleteRequest;

class PisteiroDeleteDTO
{
    public function __construct(
        public string $uuid
    ) {}

    public static function makeFromRequest(PisteiroDeleteRequest $request): self
    {
        return new self(
            $request->uuid
        );
    }
}