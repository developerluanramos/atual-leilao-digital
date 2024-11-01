<?php

namespace App\Http\Controllers\App\Cliente;

use App\Actions\Cliente\ClienteDeleteAction;
use App\DTO\Cliente\ClienteDeleteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Cliente\ClienteDeleteRequest;

class ClienteDeleteController extends Controller
{
    public function __construct(
        protected ClienteDeleteAction $deleteAction
    ) {}

    public function delete(string $uuid, ClienteDeleteRequest $request)
    {
        $request->merge([
            'uuid' => $uuid
        ]);

        $this->deleteAction->exec(ClienteDeleteDTO::makeFromRequest($request));

        return redirect()->back();
    }
}