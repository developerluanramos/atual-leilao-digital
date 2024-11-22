<?php

namespace App\Http\Controllers\App\Promissoria;

use App\Actions\Promissoria\PromissoriaViaInternaAction;
use App\DTO\Promissoria\PromissoriaViaInternaDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Promissoria\PromissoriaViaInternaRequest;

class PromissoriaViaInternaController extends Controller
{
    public function __construct(
        protected PromissoriaViaInternaAction $action
    ) {}

    public function promissoriaInterna(PromissoriaViaInternaRequest $request)
    {
        return $this->action->exec(PromissoriaViaInternaDTO::makeFromRequest($request));
    }
}