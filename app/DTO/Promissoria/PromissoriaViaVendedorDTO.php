<?php

namespace App\DTO\Promissoria;

use App\Http\Requests\App\Promissoria\PromissoriaViaVendedorRequest;

class PromissoriaViaVendedorDTO
{
    public function __construct(
        public string $compraUuid
    ) {}

    public static function makeFromRequest(PromissoriaViaVendedorRequest $request)
    {
        return new self(
            $request->compraUuid
        );
    }
}