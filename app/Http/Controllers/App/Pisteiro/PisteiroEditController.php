<?php

namespace App\Http\Controllers\App\Pisteiro;

use App\Actions\Pisteiro\PisteiroCreateAction;
use App\Actions\Pisteiro\PisteiroEditAction;
use App\DTO\Pisteiro\PisteiroEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Pisteiro\PisteiroEditRequest;

class PisteiroEditController extends Controller
{
    public function __construct(
        protected PisteiroEditAction $editAction,
        protected PisteiroCreateAction $createAction
    ) { }

    public function edit(string $uuid, PisteiroEditRequest $request)
    {
        $request->merge([
            "uuid" => $uuid
        ]);

        $formData = $this->createAction->exec();

        $pisteiro = $this->editAction->exec(PisteiroEditDTO::makeFromRequest($request));

        return view('app.pisteiro.edit', [
            "pisteiro" => $pisteiro,
            "formData" => $formData
        ]);
    }
}