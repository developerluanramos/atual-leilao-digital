<?php

namespace App\Http\Controllers\App\Leilao;

use App\Actions\Leilao\LeilaoUpdateAction;
use App\DTO\Leilao\LeilaoUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\LeilaoUpdateRequest;
use Illuminate\Support\Facades\Cache;

class LeilaoUpdateController extends Controller
{
    public function __construct(
        protected LeilaoUpdateAction $updateAction
    )
    { }

    public function update(string $uuid, LeilaoUpdateRequest $request)
    {
        $request->merge([
            'uuid' => $uuid
        ]);

        $this->updateAction->exec(LeilaoUpdateDTO::makeFromRequest($request));

        Cache::forget('leiloes');
        Cache::forget('leilao_show_'. $uuid);

        return redirect()->route('leilao.index');
    }
}
