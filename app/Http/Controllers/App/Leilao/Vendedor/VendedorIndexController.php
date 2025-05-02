<?php

namespace App\Http\Controllers\App\Leilao\Vendedor;

use App\Models\Compra;
use App\Models\Leilao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class VendedorIndexController
{
    public function index(string $leilaoUuid, Request $request)
    {
        $leilao = Leilao::where('uuid', $leilaoUuid)->first();

        $vendedores = Compra::where('compra.leilao_uuid', $leilaoUuid)
            ->join('cliente', 'compra.vendedor_uuid', '=', 'cliente.uuid')
            ->join('lote', 'compra.lote_uuid', '=', 'lote.uuid')
            ->selectRaw('
                compra.vendedor_uuid,
                COUNT(DISTINCT compra.lote_uuid) as total_lotes,
                SUM(compra.valor) as valor_total,
                SUM(lote.multiplicador) as total_itens,
                cliente.nome as vendedor_nome,
                cliente.cpf_cnpj as vendedor_documento,
                cliente.endereco as endereco
            ')
            ->groupBy('compra.vendedor_uuid', 'cliente.nome', 'cliente.cpf_cnpj', 'cliente.endereco')
            ->orderBy('cliente.nome', 'ASC')
            ->get();

        $total_geral = $vendedores->sum('valor_total');
        $total_lotes = $vendedores->sum('total_lotes');

        return view('app.leilao.show', [
            'aba' => 'vendedores',
            'action' => 'index',
            'leilao' => $leilao,
            'vendedores' => $vendedores,
            'total_lotes' => $total_lotes,
            'total_geral' => $total_geral,
        ]);
    }
}
