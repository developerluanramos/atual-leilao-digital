<?php

namespace App\Http\Controllers\App\Mapa;

use App\Http\Controllers\Controller;
use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Leilao;
use Illuminate\Support\Facades\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MapaLoteALoteShowController extends Controller
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
        
        $pdf->loadView('app.mapa.lote-a-lote', ['leilao' => $leilao]);
        
        return $this->stream($pdf, 'lote-a-lote.pdf');
    }
}