<?php

namespace App\DTO\Promotor;

use App\Http\Requests\App\Promotor\PromotorStoreRequest;

class PromotorStoreDTO
{
    public function __construct(
        public string $nome,
        public string $email,
        public string $nascido_em,
    ) { }

    public static function makeFromRequest(PromotorStoreRequest $request): self
    {
        return new self(
            $request->nome,
            $request->email,
            $request->nascido_em
        );
    }
}