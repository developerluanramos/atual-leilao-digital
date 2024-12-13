<?php

namespace App\DTO\Promissoria;

use App\Http\Requests\App\Promissoria\PromissoriaViaClienteShowRequest;

class PromissoriaViaClienteShowDTO
{
    public function __construct(
        public string $compraUuid
    ) {}

    public static function makeFromRequest(PromissoriaViaClienteShowRequest $request)
    {
        return new self(
            $request->compraUuid
        );
    }
}