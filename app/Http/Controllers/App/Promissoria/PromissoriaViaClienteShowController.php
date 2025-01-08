<?php

namespace App\Http\Controllers\App\Promissoria;

use App\Actions\Promissoria\PromissoriaViaClienteShowAction;
use App\DTO\Promissoria\PromissoriaViaClienteShowDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Promissoria\PromissoriaViaClienteShowRequest;
use App\Http\Traits\App\GeneratePdfTrait;

class PromissoriaViaClienteShowController extends Controller
{
    use GeneratePdfTrait;

    public function __construct(
        protected PromissoriaViaClienteShowAction $action
    ) {}

    public function promissoriaCliente(PromissoriaViaClienteShowRequest $request)
    {
        $compra =  $this->action->exec(PromissoriaViaClienteShowDTO::makeFromRequest($request));
        
        $pdf = $this->setOptions();
        $pdf = $this->loadView($pdf, 'app.promissoria.cliente', ['compra' => $compra]);
        
        return $this->stream($pdf, 'promissoria-cliente.pdf');
    }
}