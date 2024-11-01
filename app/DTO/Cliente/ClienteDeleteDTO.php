<?php

namespace App\DTO\Cliente;

use App\Http\Requests\App\Cliente\ClienteDeleteRequest;

class ClienteDeleteDTO 
{
    public function __construct(
        public string $uuid
    )
    { }

    public static function makeFromRequest(ClienteDeleteRequest $request)
    {
        return new self(
            $request->uuid
        );
    }
}