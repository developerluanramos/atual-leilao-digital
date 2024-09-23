<?php

namespace App\Http\Controllers\App\Raca;

use App\Actions\Raca\RacaDeleteAction;
use App\DTO\Raca\RacaDeleteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Raca\RacaDeleteRequest;

class RacaDeleteController extends Controller
{
    public function __construct(
        protected RacaDeleteAction $deleteAction
    ) { }

    public function delete(RacaDeleteRequest $request)
    {
        $this->deleteAction->exec(RacaDeleteDTO::makeFromRequest($request));

        return redirect()->back();
    }
}