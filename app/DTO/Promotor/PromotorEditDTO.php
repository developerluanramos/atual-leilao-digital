<?php

namespace App\DTO\Promotor;

use App\Http\Requests\App\Promotor\PromotorEditRequest;

class PromotorEditDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(PromotorEditRequest $request): self
    {
        return new self(
            $request->uuid
        );
    }
}