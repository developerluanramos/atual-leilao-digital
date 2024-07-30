<?php

namespace App\Http\Controllers\App\Leilao\Lote;

use App\Actions\Leilao\Lote\LoteCreateAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class LoteCreateController extends Controller
{
    public function create($leilaoUuid, Request $request, LoteCreateAction $action)
    {
        $formData = $action->execute($leilaoUuid);

        return view('app.leilao.show', [
            'aba' => 'lotes',
            'action' => 'create',
            'leilao' => $formData['leilao'],
            'formData' => $formData
        ]);
    }
}
