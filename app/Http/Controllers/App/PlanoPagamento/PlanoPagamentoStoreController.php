<?php

namespace App\Http\Controllers\App\PlanoPagamento;

use App\Actions\PlanoPagamento\PlanoPagamentoStoreAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanoPagamentoStoreController extends Controller
{
    public function __construct(
        protected PlanoPagamentoStoreAction $storeAction
    ) { }

    public function store(Request $request)
    {
        $this->storeAction->exec($request);

        return redirect()->route('plano-pagamento.index');
    }
}