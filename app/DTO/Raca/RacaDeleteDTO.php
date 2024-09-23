<?php

namespace App\DTO\Raca;

use App\Http\Requests\App\Raca\RacaDeleteRequest;

class RacaDeleteDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(RacaDeleteRequest $request): self
    {
        return new self(
            $request->uuid,
        );
    }
}