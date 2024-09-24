<?php

namespace App\Http\Controllers\App\Promotor;

use App\Actions\Promotor\PromotorUpdateAction;
use App\DTO\Promotor\PromotorUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Promotor\PromotorUpdateRequest;

class PromotorUpdateController extends Controller
{
    public function __construct(
        protected PromotorUpdateAction $updateAction
    ) { }

    public function update(PromotorUpdateRequest $request)
    {
        $this->updateAction->exec(PromotorUpdateDTO::makeFromRequest($request));

        return redirect()->route('promotor.index');
    }
}