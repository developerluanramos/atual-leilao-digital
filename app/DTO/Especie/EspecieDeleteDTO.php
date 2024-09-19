<?php

namespace App\DTO\Especie;

use App\Http\Requests\App\Especie\EspecieDeleteRequest;

class EspecieDeleteDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(EspecieDeleteRequest $request): self
    {
        return new self(
            $request->uuid
        );
    } 
}