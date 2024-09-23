<?php

namespace App\Http\Controllers\App\Pisteiro;

use App\Actions\Pisteiro\PisteiroStoreAction;
use App\DTO\Pisteiro\PisteiroStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Pisteiro\PisteiroStoreRequest;

class PisteiroStoreController extends Controller
{
    public function __construct(
        protected PisteiroStoreAction $storeAction
    ) { }

    public function store(PisteiroStoreRequest $request)
    {
        $this->storeAction->exec(PisteiroStoreDTO::makeFromRequest($request));

        return redirect()->route('pisteiro.index');
    }
}