<?php

namespace App\DTO\Leiloeiro;

use App\Http\Requests\App\Leiloeiro\LeiloeiroEditRequest;

class LeiloeiroEditDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(LeiloeiroEditRequest $request)
    {
        return new self(
            $request->uuid
        );
    }
}