<?php

namespace App\DTO\Especie;

use App\Http\Requests\App\Especie\EspecieUpdateRequest;

class EspecieUpdateDTO
{
    public function __construct(
        public string $uuid,
        public string $nome,
        public string $descricao,
    ) { }

    public static function makeFromRequest(EspecieUpdateRequest $request): self
    {
        return new self(
            $request->uuid,
            $request->nome,
            $request->descricao
        );
    }
}