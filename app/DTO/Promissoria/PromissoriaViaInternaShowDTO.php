<?php

namespace App\DTO\Promissoria;

use App\Http\Requests\App\Promissoria\PromissoriaViaInternaShowRequest;

class PromissoriaViaInternaShowDTO
{
    public function __construct(
        public string $compraUuid
    ) {}

    public static function makeFromRequest(PromissoriaViaInternaShowRequest $request)
    {
        return new self(
            $request->compraUuid
        );
    }
}