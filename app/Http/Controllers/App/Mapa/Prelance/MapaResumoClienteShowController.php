<?php

namespace App\Http\Controllers\App\Mapa\Prelance;

use App\Http\Controllers\Controller;
use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Cliente;
use App\Models\Leilao;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class MapaResumoClienteShowController extends Controller
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
        
        $cliente = Cliente::where('uuid', $request->get('clienteUuid'))->first();

        $leilao = Leilao::with([
            'config_prelance', 
            'clientes' => function($query) use ($request) {
                $query->when(!is_null($request->get('clienteUuid')), function($query) use ($request) {
                    $query->where('uuid', $request->get('clienteUuid'));
                });
            },  
            'clientes.prelances' => function($query) use ($leilaoUuid) {
                $query->whereHas('lote', function($q) use ($leilaoUuid) {
                    $q->where('leilao_uuid', $leilaoUuid);
                });
            },
            'clientes.prelances.lote',
            'clientes.prelances.prelance_config'
        ])->where('uuid', $leilaoUuid)->first();
        
        $pdf->loadView('app.mapa.prelance.resumo-cliente', ['leilao' => $leilao]);
        
        return $this->stream($pdf, 'resumo-prelance-cliente-'. $cliente?->nome.'.pdf');
    }
}