<?php

namespace App\Http\Controllers\App\Mapa;

use App\Http\Controllers\Controller;
use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Compra;
use App\Models\Leilao;
use Illuminate\Support\Facades\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MapaMediaRacaShowController extends Controller
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
        
        $leilao = Leilao::where("uuid", $leilaoUuid)->first();
        $mediasRaca = Compra::join('lote', 'compra.lote_uuid', '=', 'lote.uuid')
            ->join('lote_item', 'lote.uuid', '=', 'lote_item.lote_uuid')
            ->join('raca', 'lote_item.raca_uuid', '=', 'raca.uuid')
            ->selectRaw('
                raca.uuid AS raca_id,
                raca.nome AS raca_nome,
                AVG(compra.valor) AS media_compra,
                SUM(compra.valor) AS total_raca_value,
                (SUM(compra.valor) / ?) * 100 AS percent,
                COUNT(compra.id) AS quantidade,
                AVG(CASE WHEN lote_item.genero = 1 THEN compra.valor ELSE NULL END) AS media_compra_macho,
                SUM(CASE WHEN lote_item.genero = 1 THEN compra.valor ELSE 0 END) AS total_raca_value_macho,
                (SUM(CASE WHEN lote_item.genero = 1 THEN compra.valor ELSE 0 END) / ?) * 100 AS percent_macho,
                COUNT(CASE WHEN lote_item.genero = 1 THEN 1 ELSE NULL END) AS quantidade_macho,
                AVG(CASE WHEN lote_item.genero = 2 THEN compra.valor ELSE NULL END) AS media_compra_femea,
                SUM(CASE WHEN lote_item.genero = 2 THEN compra.valor ELSE 0 END) AS total_raca_value_femea,
                (SUM(CASE WHEN lote_item.genero = 2 THEN compra.valor ELSE 0 END) / ?) * 100 AS percent_femea,
                COUNT(CASE WHEN lote_item.genero = 2 THEN 1 ELSE NULL END) AS quantidade_femea,
                AVG(CASE WHEN lote_item.genero = 3 THEN compra.valor ELSE NULL END) AS media_compra_outro,
                SUM(CASE WHEN lote_item.genero = 3 THEN compra.valor ELSE 0 END) AS total_raca_value_outro,
                (SUM(CASE WHEN lote_item.genero = 3 THEN compra.valor ELSE 0 END) / ?) * 100 AS percent_outro,
                COUNT(CASE WHEN lote_item.genero = 3 THEN 1 ELSE NULL END) AS quantidade_outro
            ', [$leilao->valor_total, $leilao->valor_total, $leilao->valor_total, $leilao->valor_total]) 
            ->groupBy('raca.uuid', 'raca.nome')
            ->orderBy('raca.nome')
            ->where('compra.leilao_uuid', $leilaoUuid)
            ->get();
        
        //  dd($medias);
        $pdf->loadView('app.mapa.media-raca', ['mediasRaca' => $mediasRaca, 'leilao' => $leilao]);
        
        return $this->stream($pdf, 'media-raca.pdf');
    }
}