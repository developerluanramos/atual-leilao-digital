<?php

namespace App\Http\Controllers\App\Promissoria;

use App\Actions\Promissoria\PromissoriaViaVendedorAction;
use App\DTO\Promissoria\PromissoriaViaVendedorDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Promissoria\PromissoriaViaVendedorRequest;

class PromissoriaViaVendedorController extends Controller
{
    public function __construct(
        protected PromissoriaViaVendedorAction $action
    ) {}

    public function promissoriaVendedor(PromissoriaViaVendedorRequest $request)
    {
        return $this->action->exec(PromissoriaViaVendedorDTO::makeFromRequest($request));
    }
}