<?php

namespace App\Http\Controllers\App\Especie;

use App\Actions\Especie\EspecieUpdateAction;
use App\DTO\Especie\EspecieUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Especie\EspecieUpdateRequest;

class EspecieUpdateController extends Controller
{
    public function __construct(
        protected EspecieUpdateAction $updateAction
    ) { }

    public function update(EspecieUpdateRequest $request)
    {
        $this->updateAction->exec(EspecieUpdateDTO::makeFromRequest($request));

        return redirect()->route('especie.index')->with('message', 'Registro atualizado');
    }
}