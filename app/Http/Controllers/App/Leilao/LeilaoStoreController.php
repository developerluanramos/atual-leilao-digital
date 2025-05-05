<?php

namespace App\Http\Controllers\App\Leilao;

use App\Actions\Leilao\LeilaoStoreAction;
use App\DTO\Leilao\LeilaoStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\LeilaoStoreRequest;
use Illuminate\Support\Facades\Cache;

class LeilaoStoreController extends Controller
{
    public function __construct(
        protected LeilaoStoreAction $storeAction
    ) { }

    public function store(LeilaoStoreRequest $request)
    {
        $this->storeAction->exec(LeilaoStoreDTO::makeFromRequest($request));

        Cache::forget('leiloes');

        return redirect()->route('leilao.index');
    }
}
