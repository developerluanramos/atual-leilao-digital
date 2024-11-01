<?php

namespace App\Http\Controllers\App\Cliente;

use App\Actions\Cliente\ClienteUpdateAction;
use App\DTO\Cliente\ClienteUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Cliente\ClienteUpdateRequest;

class ClienteUpdateController extends Controller
{
    public function __construct(
        protected ClienteUpdateAction $updateAction
    ) {}

    public function update(string $uuid, ClienteUpdateRequest $request)
    {
        $request->merge([
            'uuid' => $uuid
        ]);

        $this->updateAction->exec(ClienteUpdateDTO::makeFromRequest($request));

        return redirect()->route('cliente.index');
    }
}
