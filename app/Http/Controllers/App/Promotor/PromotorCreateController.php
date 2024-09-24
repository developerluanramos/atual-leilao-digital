<?php

namespace App\Http\Controllers\App\Promotor;

use App\Actions\Promotor\PromotorCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Promotor\PromotorCreateRequest;

class PromotorCreateController extends Controller
{
    public function __construct(
        protected PromotorCreateAction $createAction
    ) { }

    public function create(PromotorCreateRequest $request)
    {
        $formData = $this->createAction->exec();

        return view('app.promotor.create', compact('formData'));
    }
}