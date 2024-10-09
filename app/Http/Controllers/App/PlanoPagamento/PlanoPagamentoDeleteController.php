<?php

namespace App\Http\Controllers\App\PlanoPagamento;

use App\Actions\PlanoPagamento\PlanoPagamentoDeleteAction;
use App\Http\Controllers\Controller;

class PlanoPagamentoDeleteController extends Controller
{
    public function __construct(
        protected PlanoPagamentoDeleteAction $deleteAction    
    ) {}

    public function delete(string $uuid)
    {
        $this->deleteAction->exec($uuid);

        return redirect()->back();
    }
}