<?php

namespace App\Http\Controllers\App\Especie;

use App\Actions\Especie\EspecieCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Especie\EspecieCreateRequest;

class EspecieCreateController extends Controller
{
    public function __construct(
        protected EspecieCreateAction $especieCreateAction
    ) { }

    public function create(EspecieCreateRequest $request)
    {
        $formData = $this->especieCreateAction->exec($request);

        return view('app.especie.create', compact('formData'));
    }
}