<?php

namespace App\Http\Controllers\App\PlanoPagamento;

use App\Http\Controllers\Controller;

class PlanoPagamentoCreateController extends Controller
{
    public function __construct()
    { }

    public function create()
    {
        $condicoesPagamento = [];

        return view('app.plano-pagamento.create', compact('condicoesPagamento'));
    }
}