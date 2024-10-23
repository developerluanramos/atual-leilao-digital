<?php

namespace App\Http\Controllers\App\Leilao;

use App\Actions\Leilao\LeilaoUpdateAction;
use App\DTO\Leilao\LeilaoUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\LeilaoUpdateRequest;

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

        return redirect()->route('leilao.index');
    }
}