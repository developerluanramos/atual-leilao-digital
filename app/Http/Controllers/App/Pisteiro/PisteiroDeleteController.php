<?php

namespace App\Http\Controllers\App\Pisteiro;

use App\Actions\Pisteiro\PisteiroDeleteAction;
use App\DTO\Pisteiro\PisteiroDeleteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Pisteiro\PisteiroDeleteRequest;

class PisteiroDeleteController extends Controller
{
    public function __construct(
        protected PisteiroDeleteAction $deleteAction
    ) { }

    public function delete(PisteiroDeleteRequest $request)
    {
        $this->deleteAction->exec(PisteiroDeleteDTO::makeFromRequest($request));

        return redirect()->back();
    }
}