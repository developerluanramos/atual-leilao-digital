<?php

namespace App\DTO\Leiloeiro;

use App\Http\Requests\App\Leiloeiro\LeiloeiroDeleteRequest;

class LeiloeiroDeleteDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(LeiloeiroDeleteRequest $request): self
    {
        return new self(
            $request->uuid
        );
    }
}