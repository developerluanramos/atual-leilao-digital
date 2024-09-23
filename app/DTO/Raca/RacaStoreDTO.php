<?php

namespace App\DTO\Raca;

use App\Http\Requests\App\Raca\RacaStoreRequest;

class RacaStoreDTO
{
    public function __construct(
        public string $nome,
        public string $descricao
    ) { }

    public static function makeFromRequest(RacaStoreRequest $request): self
    {
        return new self(
            $request->nome,
            $request->descricao
        );
    }
}