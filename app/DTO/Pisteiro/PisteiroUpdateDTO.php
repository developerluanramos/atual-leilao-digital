<?php

namespace App\DTO\Pisteiro;

use App\Http\Requests\App\Pisteiro\PisteiroUpdateRequest;

class PisteiroUpdateDTO
{
    public function __construct(
        public string $uuid,
        public string $nome,
        public string $email,
        public string $nascido_em,
    ) { }

    public static function makeFromRequest(PisteiroUpdateRequest $request): self
    {
        return new self(
            $request->uuid,
            $request->nome,
            $request->email,
            $request->nascido_em
        );
    }
}