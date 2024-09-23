<?php

namespace App\Http\Controllers\App\Raca;

use App\Actions\Raca\RacaUpdateAction;
use App\DTO\Raca\RacaUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Raca\RacaUpdateRequest;

class RacaUpdateController extends Controller
{
    public function __construct(
        protected RacaUpdateAction $updateAction
    ) { }

    public function update(RacaUpdateRequest $request)
    {
        $this->updateAction->exec(RacaUpdateDTO::makeFromRequest($request));

        return redirect()->route('raca.index')->with('message', 'Registro atualizado');
    }
}