<?php

namespace App\Http\Controllers\App\Mapa;

use App\Http\Controllers\Controller;
use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Leilao;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapaAcertoCompradorShowController extends Controller
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

        $compras = Compra::with(['lote', 'leilao', 'vendedor'])
            ->join('lote', 'compra.lote_uuid', '=', 'lote.uuid')
            ->where('compra.cliente_uuid', $request->get('clienteUuid'))
            ->where('compra.leilao_uuid', $leilaoUuid)
            ->select('compra.*') // Garante que apenas colunas da compra sejam retornadas
            ->orderBy('lote.numero', 'ASC')
            ->get();

        $vendas = Compra::with(['lote', 'leilao', 'cliente'])
            ->join('lote', 'compra.lote_uuid', '=', 'lote.uuid')
            ->where('compra.vendedor_uuid', $request->get('clienteUuid'))
            ->where('compra.leilao_uuid', $leilaoUuid)
            ->select('compra.*') // Garante que apenas colunas da compra sejam retornadas
            ->orderBy('lote.numero', 'ASC')
            ->get();

        $cliente  = Cliente::where('uuid', $request->get('clienteUuid'))->first();

        $pdf->loadView('app.mapa.acerto-comprador', [
            'leilao' => $leilao,
            'compras' => $compras,
            'vendas' => $vendas,
            'cliente' => $cliente,
        ]);

        return $this->stream($pdf, 'acerto-comprador.pdf');
    }
}
