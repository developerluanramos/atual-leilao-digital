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

    public function mapa(Request $request)
    {
        $options = [
            'defaultFont' => 'sans-serif',
            'enable-javascript' => true,
            'images' => true,
            'isRemoteEnabled' => true,
            'orientation' => 'portrait'
        ];
        $pdf = Pdf::setOptions($options);

        $view = 'app.mapa.lote-a-lote';
        $fileName = 'lote-a-lote.pdf';
        
        $leilao = Leilao::where('uuid', "96792ad1-2852-4500-b190-084b79a54e89")->first();
        
        $pdf->loadView($view, ['leilao' => $leilao]);
        
        return $this->stream($pdf, $fileName);
    }
}