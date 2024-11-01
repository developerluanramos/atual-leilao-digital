<?php

namespace App\DTO\Cliente;

use App\Http\Requests\App\Cliente\ClienteEditRequest;

class ClienteEditDTO 
{
    public function __construct(
        public string $uuid
    )
    { }

    public static function makeFromRequest(ClienteEditRequest $request)
    {
        return new self(
            $request->uuid
        );
    }
}