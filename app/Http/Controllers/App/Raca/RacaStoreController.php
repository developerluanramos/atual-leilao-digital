<?php

namespace App\Http\Controllers\App\Raca;

use App\Actions\Raca\RacaStoreAction;
use App\DTO\Raca\RacaStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Raca\RacaStoreRequest;

class RacaStoreController extends Controller
{
    public function __construct(
        protected RacaStoreAction $storeAction
    ) { }

    public function store(RacaStoreRequest $request)
    {
        $this->storeAction->exec(RacaStoreDTO::makeFromRequest($request));

        return redirect()->route('raca.index');
    }

}
