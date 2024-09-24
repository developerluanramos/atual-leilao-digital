<?php

namespace App\Http\Controllers\App\Promotor;

use App\Actions\Promotor\PromotorDeleteAction;
use App\DTO\Promotor\PromotorDeleteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Promotor\PromotorDeleteRequest;

class PromotorDeleteController extends Controller
{
    public function __construct(
        protected PromotorDeleteAction $deleteAction
    ) { }

    public function delete(PromotorDeleteRequest $request)
    {
        $this->deleteAction->exec(PromotorDeleteDTO::makeFromRequest($request));

        return redirect()->back();
    }
}