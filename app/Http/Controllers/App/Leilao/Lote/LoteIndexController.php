<?php

namespace App\Http\Controllers\App\Leilao\Lote;

use App\Actions\Leilao\Lote\LoteIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LoteIndexController extends Controller
{
    public function index($leilaoUuid, Request $request, LoteIndexAction $action)
    {
        $dataCreate = Cache::rememberForever('leilao_lotes_index_'. $leilaoUuid, function () use ($leilaoUuid, $action, $request) {
            return $action->execute(
                $request->get('page', 1),
                40,
                $request->get('filter', null),
                $leilaoUuid
            );
        });

        return view('app.leilao.show', [
            'aba' => 'lotes',
            'action' => 'index',
            'leilao' => $dataCreate['leilao'],
            'lotes' => $dataCreate['lotes']
        ]);
    }
}
