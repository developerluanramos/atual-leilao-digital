<?php

namespace App\Http\Controllers\App\Pisteiro;

use App\Actions\Pisteiro\PisteiroCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Pisteiro\PisteiroCreateRequest;

class PisteiroCreateController extends Controller
{
    public function __construct(
        protected PisteiroCreateAction $createAction
    ) { }

    public function create(PisteiroCreateRequest $request)
    {
        $formData = $this->createAction->exec();
        
        return view('app.pisteiro.create', compact('formData'));
    }
}