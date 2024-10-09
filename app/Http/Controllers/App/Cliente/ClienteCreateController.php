<?php

namespace App\http\Controllers\App\Cliente;

use App\Actions\Cliente\ClienteCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Cliente\ClienteCreateRequest;

class ClienteCreateController extends Controller
{
    public function __construct(
        protected ClienteCreateAction $createAction    
    ) { }

    public function create(ClienteCreateRequest $request)
    {
        $formData = $this->createAction->exec();

        return view('app.cliente.create', compact('formData'));
    }
}