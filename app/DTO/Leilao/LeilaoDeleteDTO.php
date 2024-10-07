<?php

namespace App\DTO\Leilao;

use App\Http\Requests\App\Leilao\LeilaoEditRequest;

class LeilaoEditDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(LeilaoEditRequest $request)
    {
        return new self(
            $request->uuid
        );
    }
}