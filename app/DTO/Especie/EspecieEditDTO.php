<?php

namespace App\DTO\Especie;

use App\Http\Requests\App\Especie\EspecieEditRequest;

class EspecieEditDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(EspecieEditRequest $request): self
    {
        return new self(
            $request->uuid
        );
    } 
}