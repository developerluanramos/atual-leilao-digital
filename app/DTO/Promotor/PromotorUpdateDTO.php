<?php

namespace App\DTO\Promotor;

use App\Http\Requests\App\Promotor\PromotorUpdateRequest;

class PromotorUpdateDTO
{
    public function __construct(
        public string $uuid,
        public string $nome,
        public string $email,
        public string $nascido_em,
    ) { }

    public static function makeFromRequest(PromotorUpdateRequest $request): self
    {
        return new self(
            $request->uuid,
            $request->nome,
            $request->email,
            $request->nascido_em
        );
    }
}