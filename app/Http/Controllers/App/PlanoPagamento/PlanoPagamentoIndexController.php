<?php

namespace App\http\Controllers\App\PlanoPagamento;

use App\Actions\PlanoPagamento\PlanoPagamentoIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\PlanoPagamento\PlanoPagamentoIndexRequest;

class PlanoPagamentoIndexController extends Controller
{
    public function __construct(
        protected PlanoPagamentoIndexAction $indexAction
    ) { }

    public function index(PlanoPagamentoIndexRequest $request)
    {
        $planos_pagamento = $this->indexAction->exec(
            page: $request->get('page', 1),
            totalPerPage: $request->get('totalPerPage', 15),
            filter: $request->get('filter', null),
        );

        $filters = ['filter' => $request->get('filter', null)];

        return view('app.plano-pagamento.index', compact('planos_pagamento', 'filters'));
    }
}