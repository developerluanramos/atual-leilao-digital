<?php

namespace App\Http\Controllers\App\Especie;

use App\Actions\Especie\EspecieDeleteAction;
use App\DTO\Especie\EspecieDeleteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Especie\EspecieDeleteRequest;

class EspecieDeleteController extends Controller
{
    public function __construct(
        protected EspecieDeleteAction $deleteAction
    ) { }

    public function delete(EspecieDeleteRequest $request)
    {
        $this->deleteAction->exec(EspecieDeleteDTO::makeFromRequest($request));

        return redirect()->back();
    }
}