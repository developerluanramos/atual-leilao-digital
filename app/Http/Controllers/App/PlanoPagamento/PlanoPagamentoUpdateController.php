<?php

namespace App\Http\Controllers\App\PlanoPagamento;

use App\Actions\PlanoPagamento\PlanoPagamentoUpdateAction;
use App\DTO\PlanoPagamento\PlanoPagamentoUpdateDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanoPagamentoUpdateController extends Controller
{
    public function __construct(
        protected PlanoPagamentoUpdateAction $updateAction
    ) { }

    public function update(string $uuid, Request $request)
    {
        $request->merge([
            "uuid" => $uuid
        ]);
        
        $this->updateAction->exec(PlanoPagamentoUpdateDTO::makeFromRequest($request));

        return redirect()->route('plano-pagamento.index');
    }
}