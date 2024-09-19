<?php

namespace App\DTO\Especie;

use App\Http\Requests\App\Especie\EspecieStoreRequest;

class EspecieStoreDTO
{
    public function __construct(
        public string $nome,
        public string $descricao,
    ) { }

    public static function makeFromRequest(EspecieStoreRequest $request): self
    {
        return new self(
            $request->nome,
            $request->descricao
        );
    }
}