<?php

namespace App\Http\Controllers\App\Especie;

use App\Actions\Especie\EspecieStoreAction;
use App\DTO\Especie\EspecieStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Especie\EspecieStoreRequest;

class EspecieStoreController extends Controller
{
    public function __construct(
        protected EspecieStoreAction $storeAction
    ) { }

    public function store(EspecieStoreRequest $request)
    {
        $this->storeAction->exec(EspecieStoreDTO::makeFromRequest($request));

        return redirect()->route('especie.index');
    }
}