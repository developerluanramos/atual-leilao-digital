<?php

namespace App\Http\Controllers\App\Leilao\Lote;

use App\Actions\Leilao\Lote\LoteIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class LoteIndexController extends Controller
{
    public function index($leilaoUuid, Request $request, LoteIndexAction $action)
    {
        $dataCreate = $action->execute(
            $request->get('page', 1),
            $request->get('totalPerPage', 15),
            $request->get('filter', null),
            $leilaoUuid
        );

        return view('app.leilao.show', [
            'aba' => 'lotes',
            'action' => 'index',
            'leilao' => $dataCreate['leilao'],
            'lotes' => $dataCreate['lotes']
        ]);
    }
}
