<?php

namespace App\Http\Controllers\App\Raca;

use App\Actions\Raca\RacaCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Raca\RacaCreateRequest;

class RacaCreateController extends Controller
{
    public function __construct(
        protected RacaCreateAction $createAction
    ) { }

    public function create(RacaCreateRequest $racaCreateRequest)
    {
        $formData = $this->createAction->exec();
        return view('app.raca.create', compact('formData'));
    }
}
