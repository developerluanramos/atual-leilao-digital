<?php

namespace App\Http\Controllers\App\Compra;

use App\Actions\Compra\CompraStoreAction;
use App\DTO\Compra\CompraStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Compra\CompraStoreRequest;

class CompraStoreController extends Controller
{
    public function store(CompraStoreRequest $request, CompraStoreAction $action): void
    {
        $action->execute(CompraStoreDTO::makeFromRequest($request));
    }
}
