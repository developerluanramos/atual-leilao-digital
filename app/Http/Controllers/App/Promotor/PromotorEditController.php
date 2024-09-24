<?php

namespace App\Http\Controllers\App\Promotor;

use App\Actions\Promotor\PromotorCreateAction;
use App\Actions\Promotor\PromotorEditAction;
use App\DTO\Promotor\PromotorEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Promotor\PromotorEditRequest;

class PromotorEditController extends Controller
{
    public function __construct(
        protected PromotorEditAction $editAction,
        protected PromotorCreateAction $createAction
    ) { }

    public function edit(string $uuid, PromotorEditRequest $request)
    {
        $request->merge([
            "uuid" => $uuid
        ]);

        $formData = $this->createAction->exec();

        $promotor = $this->editAction->exec(PromotorEditDTO::makeFromRequest($request));

        return view('app.promotor.edit', [
            "promotor" => $promotor,
            "formData" => $formData
        ]);
    }
}