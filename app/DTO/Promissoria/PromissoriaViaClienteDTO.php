<?php

namespace App\DTO\Promissoria;

use App\Http\Requests\App\Promissoria\PromissoriaViaClienteRequest;

class PromissoriaViaClienteDTO
{
    public function __construct(
        public string $compraUuid
    ) {}

    public static function makeFromRequest(PromissoriaViaClienteRequest $request)
    {
        return new self(
            $request->compraUuid
        );
    }
}