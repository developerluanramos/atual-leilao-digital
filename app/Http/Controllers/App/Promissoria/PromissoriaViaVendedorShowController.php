<?php

namespace App\Http\Controllers\App\Promissoria;

use App\Actions\Promissoria\PromissoriaViaVendedorShowAction;
use App\DTO\Promissoria\PromissoriaViaVendedorShowDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Promissoria\PromissoriaViaVendedorShowRequest;
use App\Http\Traits\App\GeneratePdfTrait;

class PromissoriaViaVendedorShowController extends Controller
{
    use GeneratePdfTrait;
    
    public function __construct(
        protected PromissoriaViaVendedorShowAction $action
    ) {}

    public function promissoriaVendedor(PromissoriaViaVendedorShowRequest $request)
    {
        $view = 'app.promissoria.vendedor';
        $fileName = 'promissoria-vendedor.pdf';

        $compra =  $this->action->exec(PromissoriaViaVendedorShowDTO::makeFromRequest($request));
        
        $pdf = $this->setOptions();
        $pdf = $this->loadView($pdf, $view, $compra);
        return $this->stream($pdf, $fileName);
    }
}