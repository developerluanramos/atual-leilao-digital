<?php

namespace App\Http\Controllers\App\Mapa\Prelance;

use App\Http\Controllers\Controller;
use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Cliente;
use App\Models\Leilao;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class MapaResumoLoteShowController extends Controller
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
            'orientation' => 'landascape'
        ];
        
        $pdf = Pdf::setOptions($options);

        $leilao = Leilao::with([
            'config_prelance',  
            'lotes', 
        ])->where('uuid', $leilaoUuid)->first();
        
        $pdf->loadView('app.mapa.prelance.resumo-lote', ['leilao' => $leilao]);
        
        return $this->stream($pdf, 'resumo-prelance-resumo-lote.pdf');
    }
}