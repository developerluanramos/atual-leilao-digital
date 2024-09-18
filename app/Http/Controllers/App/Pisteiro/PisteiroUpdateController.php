<?php

namespace App\Http\Controllers\App\Pisteiro;

use App\Actions\Pisteiro\PisteiroUpdateAction;
use App\DTO\Pisteiro\PisteiroUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Pisteiro\PisteiroUpdateRequest;

class PisteiroUpdateController extends Controller
{
    public function __construct(
        protected PisteiroUpdateAction $updateAction
    ) { }

    public function update(PisteiroUpdateRequest $request)
    {
        $this->updateAction->exec(PisteiroUpdateDTO::makeFromRequest($request));

        return redirect()->route('pisteiro.index');
    }
}