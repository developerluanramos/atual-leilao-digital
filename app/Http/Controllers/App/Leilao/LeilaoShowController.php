<?php

namespace App\Http\Controllers\App\Leilao;

use App\Actions\Leilao\LeilaoShowAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeilaoShowController extends Controller
{
    public function __construct() {}

    public function show(Request $leilaoShowRequest, LeilaoShowAction $leilaoShowAction)
    {
        $aba = 'dados-gerais';
        if ($leilaoShowRequest->input('aba') !== null) {
            $aba = $leilaoShowRequest->input('aba');
        }

        $leilao = $leilaoShowAction->exec();

        return view('app.leilao.show', [
            'leilao' => $leilao,
            'aba' => $aba
        ]);
    }
}
