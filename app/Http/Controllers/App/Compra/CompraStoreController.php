<?php

namespace App\Http\Controllers\App\Compra;

use App\Actions\Compra\CompraStoreAction;
use App\DTO\Compra\CompraStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Compra\CompraStoreRequest;
use Illuminate\Support\Facades\Cache;

class CompraStoreController extends Controller
{
    public function store(CompraStoreRequest $request, CompraStoreAction $action): void
    {
        $action->execute(CompraStoreDTO::makeFromRequest($request));

        Cache::forget('leilao_lotes_index_'. $request->leilao_uuid);
        Cache::forget('leilao_show_'. $request->leilao_uuid);
    }
}
