<?php

namespace App\Http\Controllers\App\PlanoPagamento;

use App\Actions\PlanoPagamento\PlanoPagamentoEditAction;
use App\DTO\PlanoPagamento\PlanoPagamentoEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\PlanoPagamento\PlanoPagamentoEditRequest;

class PlanoPagamentoEditController extends Controller
{
    public function __construct(
        protected PlanoPagamentoEditAction $editAction
    ) { }

    public function edit(PlanoPagamentoEditRequest $request)
    {
        $planoPagamento = $this->editAction->exec(PlanoPagamentoEditDTO::makeFromRequest($request));

        return view('app.plano-pagamento.edit',compact('planoPagamento'));
    }
}