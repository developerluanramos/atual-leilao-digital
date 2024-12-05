<?php

namespace App\DTO\Promissoria;

use App\Http\Requests\App\Promissoria\PromissoriaViaVendedorShowRequest;

class PromissoriaViaVendedorShowDTO
{
    public function __construct(
        public string $compraUuid
    ) {}

    public static function makeFromRequest(PromissoriaViaVendedorShowRequest $request)
    {
        return new self(
            $request->compraUuid
        );
    }
}