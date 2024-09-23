<?php

namespace App\DTO\Pisteiro;

use App\Http\Requests\App\Pisteiro\PisteiroStoreRequest;

class PisteiroStoreDTO
{
    public function __construct(
        public string $nome,
        public string $email,
        public string $nascido_em,
    ) { }

    public static function makeFromRequest(PisteiroStoreRequest $request): self
    {
        return new self(
            $request->nome,
            $request->email,
            $request->nascido_em
        );
    }
}