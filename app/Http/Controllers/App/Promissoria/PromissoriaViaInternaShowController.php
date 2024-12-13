<?php

namespace App\Http\Controllers\App\Promissoria;

use App\Actions\Promissoria\PromissoriaViaInternaShowAction;
use App\DTO\Promissoria\PromissoriaViaInternaShowDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Promissoria\PromissoriaViaInternaShowRequest;
use App\Http\Traits\App\GeneratePdfTrait;

class PromissoriaViaInternaShowController extends Controller
{
    use GeneratePdfTrait;
    
    public function __construct(
        protected PromissoriaViaInternaShowAction $action
    ) {}

    public function promissoriaInterna(PromissoriaViaInternaShowRequest $request)
    {
        $view = 'app.promissoria.interna';
        $fileName = 'promissoria-interna.pdf';

        $compra =  $this->action->exec(PromissoriaViaInternaShowDTO::makeFromRequest($request));
        
        $pdf = $this->setOptions();
        $pdf = $this->loadView($pdf, $view, $compra);
        return $this->stream($pdf, $fileName);    
    }
}