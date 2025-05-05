<?php

namespace App\Http\Controllers\App\Leilao;

use App\Actions\Leilao\LeilaoDeleteAction;
use App\DTO\Leilao\LeilaoDeleteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\LeilaoDeleteRequest;
use Illuminate\Support\Facades\Cache;

class LeilaoDeleteController extends Controller
{
    public function __construct(
        protected LeilaoDeleteAction $deleteAction
    ) { }

    public function delete(LeilaoDeleteRequest $request)
    {
        $this->deleteAction->exec(LeilaoDeleteDTO::makeFromRequest($request));

        Cache::forget('leiloes');
        Cache::forget('leilao_show_'. $request->uuid);

        return redirect()->back();
    }
}
