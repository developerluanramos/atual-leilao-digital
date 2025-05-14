<?php

namespace App\Http\Controllers\App\Mapa;

use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Leilao;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MapaContratoCompradorShowController
{
    use GeneratePdfTrait;

    public function __construct(

    ) {}

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

        $compras = Compra::with(['lote', 'leilao', 'vendedor', 'cliente'])
            ->join('lote', 'compra.lote_uuid', '=', 'lote.uuid')
            ->where('compra.cliente_uuid', $request->get('clienteUuid'))
            ->where('compra.leilao_uuid', $leilaoUuid)
            ->select('compra.*') // Garante que apenas colunas da compra sejam retornadas
            ->orderBy('lote.numero', 'ASC')
            ->get();

        $cliente  = Cliente::where('uuid', $request->get('clienteUuid'))->first();

        $pdf->loadView('app.mapa.contratos-comprador', [
            'leilao' => $leilao,
            'compras' => $compras,
            'cliente' => $cliente,
        ]);

        return $this->stream($pdf, 'contratos-comprador.pdf');
    }
}
