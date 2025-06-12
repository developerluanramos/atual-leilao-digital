<?php

namespace App\Http\Controllers\App\Mapa\Prelance;

use App\Http\Controllers\Controller;
use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Cliente;
use App\Models\Leilao;
use App\Models\Lote;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class MapaParticipantesShowController extends Controller
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

        $leilao = Leilao::where('uuid', $leilaoUuid)->firstOrFail();
        $participantes = $leilao->clientes()->get();

        $pdf->loadView('app.mapa.prelance.participantes', ['leilao' => $leilao, 'participantes' => $participantes]);

        return $this->stream($pdf, 'prelance-participantes.pdf');
    }
}
