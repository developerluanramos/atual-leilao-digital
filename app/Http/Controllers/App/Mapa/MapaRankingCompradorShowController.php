<?php

namespace App\Http\Controllers\App\Mapa;

use App\Http\Controllers\Controller;
use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Compra;
use App\Models\Leilao;
use Illuminate\Support\Facades\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MapaRankingCompradorShowController extends Controller
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

        $compras = Compra::selectRaw('cliente_uuid, SUM(valor) as total')
                    ->with('cliente')
                    ->groupBy('cliente_uuid')
                    ->orderByDesc('total')
                    ->where('leilao_uuid', $leilaoUuid)->distinct('cliente_uuid')
                    ->get();
        
        $pdf->loadView('app.mapa.ranking-comprador', ['leilao' => $leilao, 'compras' => $compras]);
        
        return $this->stream($pdf, 'ranking-comprador.pdf');
    }
}