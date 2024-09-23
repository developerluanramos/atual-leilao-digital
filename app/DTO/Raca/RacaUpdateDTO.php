<?php

namespace App\DTO\Raca;

use App\Http\Requests\App\Raca\RacaUpdateRequest;

class RacaUpdateDTO
{
    public function __construct(
        public string $uuid,
        public string $nome,
        public string $descricao,
    ) { }
    
    public static function makeFromRequest(RacaUpdateRequest $request): self
    {
        return new self(
            $request->uuid,
            $request->nome,
            $request->descricao
        );
    } 
}