<?php

namespace App\DTO\Pisteiro;

use App\Http\Requests\App\Pisteiro\PisteiroEditRequest;

class PisteiroEditDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(PisteiroEditRequest $request): self
    {
        return new self(
            $request->uuid
        );
    }
}