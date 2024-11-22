<?php

namespace App\DTO\Promissoria;

use App\Http\Requests\App\Promissoria\PromissoriaViaInternaRequest;

class PromissoriaViaInternaDTO
{
    public function __construct(
        public string $compraUuid
    ) {}

    public static function makeFromRequest(PromissoriaViaInternaRequest $request)
    {
        return new self(
            $request->compraUuid
        );
    }
}