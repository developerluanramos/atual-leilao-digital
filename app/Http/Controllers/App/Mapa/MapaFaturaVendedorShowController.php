<?php

namespace App\Http\Controllers\App\Mapa;

use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Leilao;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MapaFaturaVendedorShowController
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

        $vendedor = Cliente::where('uuid', $request->get('clienteUuid'))->first();

        // Obter todas as compras do cliente, com relacionamentos necessários
        $compras = Compra::with(['lote', 'vendedor', 'leilao', 'parcelas'])
            ->where('vendedor_uuid', $request->get('clienteUuid'))
            ->when($leilaoUuid, function($query) use ($leilaoUuid) {
                return $query->where('compra.leilao_uuid', $leilaoUuid);
            })
            ->join('lote', 'compra.lote_uuid', '=', 'lote.uuid') // Assumindo que a tabela de lotes se chama 'lotes'
            ->orderBy('lote.numero')
            ->select('compra.*') // Garante que apenas as colunas de compras sejam retornadas
            ->get();

        // Agrupar compras por comprador
        $fatura = $compras->groupBy('cliente_uuid')->map(function ($comprasPorComprador) {
            $comprador = $comprasPorComprador->first()->cliente;
            return [
                'comprador' => $comprador,
                'quantidade_itens' => $comprasPorComprador->sum('lote.multiplicador'),
                'total_comissao' => $comprasPorComprador->sum('valor_comissao_vendedor'),
                'total_sinal' => $comprasPorComprador->sum('valor_sinal_vendedor'),
                'compras' => $comprasPorComprador,
                'total_comprador' => $comprasPorComprador->sum('valor')
            ];
        });

        // Totais gerais
        $totais = [
            'quantidade_lotes' => $compras->count(),
            'quantidade_itens' => $compras->sum('quantidade_itens'),
            'total_geral' => $compras->sum('valor'),
            'total_comissao' => $compras->sum('valor_comissao_vendedor'),
            'total_sinal' => $compras->sum('valor_sinal_vendedor'),
            'total_pagar' => $compras->sum('valor_comissao_vendedor') + $compras->sum('valor_sinal_vendedor')
        ];

        $pdf->loadView('app.mapa.fatura-vendedor', [
            'fatura' => $fatura,
            'leilao' => $leilao,
            'compras' => $compras,
            'vendedor' => $vendedor,
            'totais' => $totais
        ]);

        return $this->stream($pdf, 'fatura-vendedor.pdf');
    }
}
