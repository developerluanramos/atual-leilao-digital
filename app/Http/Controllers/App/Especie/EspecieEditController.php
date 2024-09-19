<?php

namespace App\Http\Controllers\App\Especie;

use App\Actions\Especie\EspecieCreateAction;
use App\Actions\Especie\EspecieEditAction;
use App\DTO\Especie\EspecieEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Especie\EspecieEditRequest;

class EspecieEditController extends Controller
{
    public function __construct(
        protected EspecieEditAction $editAction,
        protected EspecieCreateAction $createAction
    ) { }

    public function edit(string $uuid, EspecieEditRequest $request)
    {
        $request->merge([
            "uuid" => $uuid
        ]);

        $formData = $this->createAction->exec();

        $especie = $this->editAction->exec(EspecieEditDTO::makeFromRequest($request));

        return view('app.especie.edit', compact('especie', 'formData'));
    }
}