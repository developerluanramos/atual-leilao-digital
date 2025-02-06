<?php

namespace App\Http\Controllers\App\Mapa;

use App\Http\Controllers\Controller;
use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Compra;
use App\Models\Leilao;
use Illuminate\Support\Facades\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MapaRelacaoCompradorShowController extends Controller
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
        
        $relacaoCompradores = Compra::selectRaw('
                        cliente_uuid,
                        SUM(valor) as total,
                        AVG(valor) as media
                    ')
                    ->with('cliente')
                    ->groupBy('cliente_uuid')
                    ->orderByDesc('total')
                    ->where('leilao_uuid', $leilaoUuid)->distinct('cliente_uuid')
                    ->get();

        $pdf->loadView('app.mapa.relacao-comprador', ['leilao' => $leilao, 'relacaoCompradores' => $relacaoCompradores]);
        
        return $this->stream($pdf, 'relacao-comprador.pdf');
    }
}