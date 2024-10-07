<?php

namespace App\DTO\Leilao;

use App\Http\Requests\App\Leilao\LeilaoStoreRequest;

class LeilaoStoreDTO
{
    public function __construct(

    ) { }

    public static function makeFromRequest(LeilaoStoreRequest $request): self
    {
        return new self(
            
        );
    }
}