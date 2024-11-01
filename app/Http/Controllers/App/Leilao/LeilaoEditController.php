<?php

namespace App\http\Controllers\App\Leilao;

use App\Actions\Leilao\LeilaoCreateAction;
use App\Actions\Leilao\LeilaoEditAction;
use App\DTO\Leilao\LeilaoEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\LeilaoEditRequest;

class LeilaoEditController extends Controller
{
    public function __construct(
        protected LeilaoEditAction $editAction,
        protected LeilaoCreateAction $createAction
    ) { }

    public function edit(string $uuid, LeilaoEditRequest $request)
    {
        $request->merge([
            'uuid' => $uuid
        ]);

        $formData = $this->createAction->execute();
        $leilao = $this->editAction->exec(LeilaoEditDTO::makeFromRequest($request));

        return view('app.leilao.edit', compact('leilao', 'formData'));
    }
}