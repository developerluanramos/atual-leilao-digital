<?php

namespace App\Http\Controllers\App\Mapa;

use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Leilao;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MapaFaturaCompradorShowController
{
    use GeneratePdfTrait;

    public function __construct() {}

    public function show(string $leilaoUuid, Request $request)
    {
        $options = [
            'defaultFont' => 'sans-serif',
            'enable-javascript' => true,
            'images' => true,
            'isRemoteEnabled' => true,
            'orientation' => 'portrait'
        ];
        $pdf = Pdf::setOptions($options);

        $leilao = Leilao::where('uuid', $leilaoUuid)->first();

        $cliente = Cliente::where('uuid', $request->get('clienteUuid'))->first();

        // Obter todas as compras do cliente, com relacionamentos necessários
        $compras = Compra::with(['lote', 'vendedor', 'leilao', 'parcelas'])
            ->where('cliente_uuid', $request->get('clienteUuid'))
            ->when($leilaoUuid, function($query) use ($leilaoUuid) {
                return $query->where('compra.leilao_uuid', $leilaoUuid);
            })
            ->join('lote', 'compra.lote_uuid', '=', 'lote.uuid') // Assumindo que a tabela de lotes se chama 'lotes'
            ->orderBy('lote.numero')
            ->select('compra.*') // Garante que apenas as colunas de compras sejam retornadas
            ->get();

        // Agrupar compras por vendedor
        $fatura = $compras->groupBy('vendedor_uuid')->map(function ($comprasPorVendedor) {
            $vendedor = $comprasPorVendedor->first()->vendedor;
            return [
                'vendedor' => $vendedor,
                'quantidade_itens' => $comprasPorVendedor->sum('lote.multiplicador'),
                'total_comissao' => $comprasPorVendedor->sum('valor_comissao_comprador'),
                'total_sinal' => $comprasPorVendedor->sum('valor_sinal_comprador'),
                'compras' => $comprasPorVendedor,
                'total_vendedor' => $comprasPorVendedor->sum('valor')
            ];
        });

        // Totais gerais
        $totais = [
            'quantidade_lotes' => $compras->count(),
            'quantidade_itens' => $compras->sum('quantidade_itens'),
            'total_geral' => $compras->sum('valor'),
            'total_comissao' => $compras->sum('valor_comissao_comprador'),
            'total_sinal' => $compras->sum('valor_sinal_comprador'),
            'total_pagar' => $compras->sum('valor_comissao_comprador') + $compras->sum('valor_sinal_comprador')
        ];

        $pdf->loadView('app.mapa.fatura-comprador', [
            'fatura' => $fatura,
            'leilao' => $leilao,
            'compras' => $compras,
            'cliente' => $cliente,
            'totais' => $totais
        ]);

        return $this->stream($pdf, 'fatura-comprador.pdf');
    }
}
