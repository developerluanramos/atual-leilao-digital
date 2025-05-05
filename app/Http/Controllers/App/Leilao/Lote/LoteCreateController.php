<?php

namespace App\Http\Controllers\App\Leilao\Lote;

use App\Actions\Leilao\Lote\LoteCreateAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LoteCreateController extends Controller
{
    public function create($leilaoUuid, Request $request, LoteCreateAction $action)
    {
        $formData = $action->execute($leilaoUuid);

        Cache::forget('leilao_lotes_index_'. $leilaoUuid);
        Cache::forget('leilao_show_'. $leilaoUuid);

        return view('app.leilao.show', [
            'aba' => 'lotes',
            'action' => 'create',
            'leilao' => $formData['leilao'],
            'formData' => $formData,
            'itens' => []
        ]);
    }
}
