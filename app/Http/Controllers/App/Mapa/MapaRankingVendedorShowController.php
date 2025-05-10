<?php

namespace App\Http\Controllers\App\Mapa;

use App\Http\Controllers\Controller;
use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Compra;
use App\Models\Leilao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MapaRankingVendedorShowController extends Controller
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

//        $rankingVendedores = Compra::selectRaw('vendedor_uuid, SUM(valor) as total, AVG(valor) as media')
//                    ->with('vendedor')
//                    ->groupBy('vendedor_uuid')
//                    ->orderByDesc('total')
//                    ->where('leilao_uuid', $leilaoUuid)->distinct('vendedor_uuid')
//                    ->get();

        $rankingVendedores = Compra::select([
            'compra.vendedor_uuid',
            DB::raw('COUNT(DISTINCT compra.lote_uuid) as quantidade_lotes'),
            DB::raw('SUM(compra.valor) as total_gasto'),
            DB::raw('SUM(lote.multiplicador) as total_itens'),
            DB::raw('AVG(compra.valor) as media_por_lote'),
            DB::raw('SUM(compra.valor) / SUM(lote.multiplicador) as media_por_item'),
            DB::raw('MAX(compra.valor) as maior_compra'),
            DB::raw('MIN(compra.valor) as menor_compra')
        ])
            ->join('lote', 'compra.lote_uuid', '=', 'lote.uuid')
            ->with('vendedor')
            ->where('compra.leilao_uuid', $leilaoUuid)
            ->groupBy('compra.vendedor_uuid')
            ->orderByDesc('total_gasto')
            ->get();

        $pdf->loadView('app.mapa.ranking-vendedor', ['leilao' => $leilao, 'rankingVendedores' => $rankingVendedores]);

        return $this->stream($pdf, 'ranking-vendedor.pdf');
    }
}
