<?php

namespace App\Http\Controllers\App\Leilao;

use App\Actions\Leilao\LeilaoShowAction;
use App\Http\Controllers\Controller;
use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LeilaoShowController extends Controller
{
    public function __construct() {}

    public function show(string $uuid, Request $leilaoShowRequest, LeilaoShowAction $leilaoShowAction)
    {
        $aba = 'dados-gerais';
        if ($leilaoShowRequest->input('aba') !== null) {
            $aba = $leilaoShowRequest->input('aba');
        }

        $leilao = Cache::rememberForever('leilao_show_'. $uuid, function () use ($uuid, $leilaoShowAction) {
            return $leilaoShowAction->exec($uuid);
        });

        return view('app.leilao.show', [
            'leilao' => $leilao,
            'aba' => $aba
        ]);
    }
}
