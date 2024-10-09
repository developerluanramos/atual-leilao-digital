<?php

namespace App\Http\Controllers\App\Cliente;;

use App\Actions\Cliente\ClienteCreateAction;
use App\Actions\Cliente\ClienteEditAction;
use App\DTO\Cliente\ClienteEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Cliente\ClienteEditRequest;

class ClienteEditController extends Controller
{
    public function __construct(
        protected ClienteEditAction $editAction,
        protected ClienteCreateAction $createAction
    ) { }

    public function edit(string $uuid, ClienteEditRequest $request)
    {
        $request->merge([
            'uuid' => $uuid
        ]);

        $formData = $this->createAction->exec();
        $cliente = $this->editAction->exec(ClienteEditDTO::makeFromRequest($request));

        return view('app.cliente.edit', compact('formData', 'cliente'));
    }
}