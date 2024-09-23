<?php

namespace App\DTO\Leiloeiro;

use App\Http\Requests\App\Leiloeiro\LeiloeiroStoreRequest;

class LeiloeiroStoreDTO {
    public function __construct(
        public string $nome,
        public string $email,
        public string $nascido_em
    ) {}

    public static function makeFromRequest(LeiloeiroStoreRequest $request): self
    {
        return new self(
            $request->nome,
            $request->email,
            $request->nascido_em
        );
    }
}