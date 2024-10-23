<?php

namespace App\Http\Controllers\App\Cliente;

use App\Actions\Cliente\ClienteUpdateAction;
use App\DTO\Cliente\ClienteUpdateDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteUpdateController extends Controller
{
    public function __construct(
        protected ClienteUpdateAction $updateAction
    ) {}

    public function update(string $uuid, Request $request)
    {
        $request->merge([
            'uuid' => $uuid
        ]);

        $this->updateAction->exec(ClienteUpdateDTO::makeFromRequest($request));

        return redirect()->route('cliente.index');
    }
}
