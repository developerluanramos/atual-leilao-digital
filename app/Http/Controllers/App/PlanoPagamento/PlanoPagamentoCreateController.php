<?php

namespace App\Http\Controllers\App\PlanoPagamento;

use App\Actions\PlanoPagamento\PlanoPagamentoCreateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\PlanoPagamento\PlanoPagamentoCreateRequest;

class PlanoPagamentoCreateController extends Controller
{
    public function __construct(
        protected PlanoPagamentoCreateAction $createAction
    )
    { }

    public function create(PlanoPagamentoCreateRequest $request)
    {
        $condicoesPagamento = $this->createAction->exec();

        return view('app.plano-pagamento.create', compact('condicoesPagamento'));
    }
}