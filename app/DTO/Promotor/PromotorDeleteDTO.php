<?php

namespace App\DTO\Promotor;

use App\Http\Requests\App\Promotor\PromotorDeleteRequest;

class PromotorDeleteDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(PromotorDeleteRequest $request): self
    {
        return new self(
            $request->uuid
        );
    }
}