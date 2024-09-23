<?php

namespace App\Http\Controllers\App\Leiloeiro;

use App\Actions\Leiloeiro\LeiloeiroCreateAction;
use App\Actions\Leiloeiro\LeiloeiroEditAction;
use App\DTO\Leiloeiro\LeiloeiroEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leiloeiro\LeiloeiroEditRequest;

class LeiloeiroEditController extends Controller
{
    public function __construct(
        protected LeiloeiroEditAction $editAction,
        protected LeiloeiroCreateAction $createAction
    ) { }

    public function edit(string $uuid, LeiloeiroEditRequest $editRequest)
    {
        $editRequest->merge([
            "uuid" => $uuid
        ]);

        $formData = $this->createAction->exec();

        $leiloeiro = $this->editAction->exec(LeiloeiroEditDTO::makeFromRequest($editRequest));

        return view('app.leiloeiro.edit', [
            "leiloeiro" => $leiloeiro,
            "fromData" => $formData
        ]);
    }
}