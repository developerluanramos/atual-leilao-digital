<?php

namespace App\DTO\Raca;

use App\Http\Requests\App\Raca\RacaEditRequest;

class RacaEditDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(RacaEditRequest $request): self
    {
        return new self(
            $request->uuid,
        );
    }
}