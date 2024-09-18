<?php

namespace App\Http\Controllers\App\Leiloeiro;

use App\Actions\Leiloeiro\LeiloeiroCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leiloeiro\LeiloeiroCreateRequest;

class LeiloeiroCreateController extends Controller
{
    public function __construct(
        protected LeiloeiroCreateAction $createAction
    ) { }

    public function create(LeiloeiroCreateRequest $createRequest)
    {
        $formData = $this->createAction->exec();
        return view('app.leiloeiro.create', compact('formData'));
    }
}