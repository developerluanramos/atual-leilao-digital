<?php

namespace App\Http\Controllers\App\Leilao\Comprador;

use App\Models\Compra;
use App\Models\Leilao;

class CompradorIndexController
{
    public function index(string $leilaoUuid)
    {
        $leilao = Leilao::where('uuid', $leilaoUuid)->first();

        $compradores = Compra::where('leilao_uuid', $leilaoUuid)
                    ->join('cliente', 'compra.cliente_uuid', '=', 'cliente.uuid')
                    ->with('cliente')
                    ->selectRaw('
                compra.cliente_uuid,
                COUNT(*) as total_compras,
                SUM(compra.valor) as valor_total,
                cliente.nome as cliente_nome
            ')
            ->groupBy('compra.cliente_uuid', 'cliente.nome')
            ->orderBy('cliente.nome', 'ASC')
            ->get();

        $total_geral = $compradores->sum('valor_total');
        $total_lotes = $compradores->sum('total_compras');

        return view('app.leilao.show', [
            'aba' => 'compradores',
            'action' => 'index',
            'leilao' => $leilao,
            'compradores' => $compradores,
            'total_geral' => $total_geral,
            'total_lotes' => $total_lotes
        ]);
    }
}
