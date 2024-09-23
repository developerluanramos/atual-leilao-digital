<?php

namespace App\Http\Controllers\App\Raca;

use App\Actions\Raca\RacaCreateAction;
use App\Actions\Raca\RacaEditAction;
use App\DTO\Raca\RacaEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Raca\RacaEditRequest;

class RacaEditController extends Controller
{
    public function __construct(
        protected RacaEditAction $editAction,
        protected RacaCreateAction $createAction
    ) { }

    public function edit(string $uuid, RacaEditRequest $request)
    {
        $request->merge([
            "uuid" => $uuid
        ]);
        
        $formData = $this->createAction->exec();
        $raca = $this->editAction->exec(RacaEditDTO::makeFromRequest($request));

        return view('app.raca.edit', compact('raca', 'formData'));
    }
}