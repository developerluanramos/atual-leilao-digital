<?php

namespace App\Http\Controllers\App\Leiloeiro;

use App\Actions\Leiloeiro\LeiloeiroUpdateAction;
use App\DTO\Leiloeiro\LeiloeiroUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leiloeiro\LeiloeiroUpdateRequest;

class LeiloeiroUpdateController extends Controller
{
    public function __construct(
        protected LeiloeiroUpdateAction $updateAction
    ) { }

    public function update(LeiloeiroUpdateRequest $updateRequest)
    {
        $this->updateAction->exec(LeiloeiroUpdateDTO::makeFromRequest($updateRequest));

        return redirect()->route('leiloeiro.index')->with('message', 'Registro atualizado');
    }
}