<?php

namespace App\Http\Controllers\App\Leilao;

use App\Actions\Leilao\LeilaoShowAction;
use App\Http\Controllers\Controller;
use App\Models\Compra;
use Illuminate\Http\Request;

class LeilaoShowController extends Controller
{
    public function __construct() {}

    public function show(string $uuid, Request $leilaoShowRequest, LeilaoShowAction $leilaoShowAction)
    {
        $aba = 'dados-gerais';
        if ($leilaoShowRequest->input('aba') !== null) {
            $aba = $leilaoShowRequest->input('aba');
        }

        $leilao = $leilaoShowAction->exec($uuid);

//        $mediaCompras = Compra::select('cliente.nome', 'compra.cliente_uuid')
//            ->selectRaw('AVG(compra.valor) as media_compras')
//            ->join('cliente', 'compra.cliente_uuid', '=', 'cliente.uuid')
//            ->groupBy('compra.cliente_uuid', 'cliente.nome')
//            ->orderBy('media_compras', 'desc')
//            ->where('leilao_uuid', $uuid)
//            ->get();

        return view('app.leilao.show', [
            'leilao' => $leilao,
//            'mediaCompras' => $mediaCompras,
            'aba' => $aba
        ]);
    }
}
