<?php

namespace App\Http\Controllers\App\Leiloeiro;

use App\Actions\Leiloeiro\LeiloeiroStoreAction;
use App\DTO\Leiloeiro\LeiloeiroStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leiloeiro\LeiloeiroStoreRequest;

class LeiloeiroStoreController extends Controller
{
    public function __construct(
        protected LeiloeiroStoreAction $storeAction
    ) { }

    public function store(LeiloeiroStoreRequest $storeRequest)
    {
        $this->storeAction->exec(LeiloeiroStoreDTO::makeFromRequest($storeRequest));

        return redirect()->route('leiloeiro.index');
    }
}