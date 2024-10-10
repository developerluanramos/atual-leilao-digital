<?php

namespace App\Http\Controllers\App\Leilao;

use App\Actions\Leilao\LeilaoDeleteAction;
use App\DTO\Leilao\LeilaoDeleteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\LeilaoDeleteRequest;

class LeilaoDeleteController extends Controller
{
    public function __construct(
        protected LeilaoDeleteAction $createAction
    ) { }

    public function delete(LeilaoDeleteRequest $request)
    {
        $this->createAction->exec(LeilaoDeleteDTO::makeFromRequest($request));

        return redirect()->back();
    }
}