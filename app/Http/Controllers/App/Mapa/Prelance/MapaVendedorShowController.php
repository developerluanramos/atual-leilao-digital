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

class MapaVendedorShowController extends Controller
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
        $vendedoresSelecionados = json_decode($request->input('vendedores'));
        $leilao = Leilao::with([
            'config_prelance'
        ])->where('uuid', $leilaoUuid)->first();
        
        $lotes = Lote::with('vendedores')->whereHas('vendedores', function ($query) use ($vendedoresSelecionados) {
            $query->whereIn('uuid', $vendedoresSelecionados);
        })->get();

        // dd($lotes);
        $pdf->loadView('app.mapa.prelance.vendedor', ['leilao' => $leilao, 'lotes' => $lotes]);
        
        return $this->stream($pdf, 'resumo-prelance-cliente-'. $cliente?->nome.'.pdf');
    }
}