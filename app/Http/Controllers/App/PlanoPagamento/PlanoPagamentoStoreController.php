<?php

namespace App\Http\Controllers\App\PlanoPagamento;

use App\Actions\PlanoPagamento\PlanoPagamentoStoreAction;
use App\DTO\PlanoPagamento\PlanoPagamentoStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\PlanoPagamento\PlanoPagamentoStoreRequest;

class PlanoPagamentoStoreController extends Controller
{
    public function __construct(
        protected PlanoPagamentoStoreAction $storeAction
    ) { }

    public function store(PlanoPagamentoStoreRequest $request)
    {
        $this->storeAction->exec(PlanoPagamentoStoreDTO::makeFromRequest($request));

        return redirect()->route('plano-pagamento.index');
    }
}