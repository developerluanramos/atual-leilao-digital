<?php

namespace App\Http\Controllers\App\Promissoria;

use App\Actions\Promissoria\PromissoriaViaClienteAction;
use App\DTO\Promissoria\PromissoriaViaClienteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Promissoria\PromissoriaViaClienteRequest;

class PromissoriaViaClienteController extends Controller
{
    public function __construct(
        protected PromissoriaViaClienteAction $action
    ) {}

    public function promissoriaCliente(PromissoriaViaClienteRequest $request)
    {
        return $this->action->exec(PromissoriaViaClienteDTO::makeFromRequest($request));
    }
}