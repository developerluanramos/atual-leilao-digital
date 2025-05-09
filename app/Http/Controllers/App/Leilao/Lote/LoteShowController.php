<?php

namespace App\Http\Controllers\App\Leilao\Lote;

use App\Actions\Leilao\Lote\LoteShowAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LoteShowController extends Controller
{
    public function show($leilaoUuid, $loteUuid, Request $request, LoteShowAction $action)
    {
        $formData = Cache::rememberForever('leilao_lote_show.'.$loteUuid, function () use ($leilaoUuid, $loteUuid, $request, $action) {
            return $action->execute($leilaoUuid, $loteUuid);
        });

        return view('app.leilao.show', [
            'aba' => 'lotes',
            'action' => 'show',
            'leilao' => $formData['leilao'],
            'lote' => $formData['lote'],
            'formData' => $formData,
        ]);
    }
}
