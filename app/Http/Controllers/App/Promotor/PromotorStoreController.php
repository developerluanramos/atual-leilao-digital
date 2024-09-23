<?php

namespace App\Http\Controllers\App\Promotor;

use App\Actions\Promotor\PromotorStoreAction;
use App\DTO\Promotor\PromotorStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Promotor\PromotorStoreRequest;

class PromotorStoreController extends Controller
{
    public function __construct(
        protected PromotorStoreAction $storeAction
    ) { }

    public function store(PromotorStoreRequest $request)
    {
        $this->storeAction->exec(PromotorStoreDTO::makeFromRequest($request));

        return redirect()->route('promotor.index');
    }
}