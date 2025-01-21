<?php

namespace App\Http\Controllers\App\Mapa;

use App\Http\Controllers\Controller;
use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Compra;
use App\Models\Leilao;
use Illuminate\Support\Facades\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class MapaMediaEspecieshowController extends Controller
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
            'orientation' => 'portrait',
            'tempDir' => public_path(),
            'chroot' => public_path()
        ];
        
        $pdf = Pdf::setOptions($options);
        
        $leilao = Leilao::where("uuid", $leilaoUuid)->first();
        $medias = Compra::join('lote', 'compra.lote_uuid', '=', 'lote.uuid')
            ->join('lote_item', 'lote.uuid', '=', 'lote_item.lote_uuid')
            ->join('especie', 'lote_item.especie_uuid', '=', 'especie.uuid')
            ->selectRaw('
                especie.uuid AS especie_id,
                especie.nome AS especie_nome,
                AVG(compra.valor) AS media_compra,
                SUM(compra.valor) AS total_especie_value,
                (SUM(compra.valor) / ?) * 100 AS percent,
                COUNT(compra.id) AS quantidade,
                AVG(CASE WHEN lote_item.genero = 1 THEN compra.valor ELSE NULL END) AS media_compra_macho,
                SUM(CASE WHEN lote_item.genero = 1 THEN compra.valor ELSE 0 END) AS total_especie_value_macho,
                (SUM(CASE WHEN lote_item.genero = 1 THEN compra.valor ELSE 0 END) / ?) * 100 AS percent_macho,
                COUNT(CASE WHEN lote_item.genero = 1 THEN 1 ELSE NULL END) AS quantidade_macho,
                AVG(CASE WHEN lote_item.genero = 2 THEN compra.valor ELSE NULL END) AS media_compra_femea,
                SUM(CASE WHEN lote_item.genero = 2 THEN compra.valor ELSE 0 END) AS total_especie_value_femea,
                (SUM(CASE WHEN lote_item.genero = 2 THEN compra.valor ELSE 0 END) / ?) * 100 AS percent_femea,
                COUNT(CASE WHEN lote_item.genero = 2 THEN 1 ELSE NULL END) AS quantidade_femea,
                AVG(CASE WHEN lote_item.genero = 3 THEN compra.valor ELSE NULL END) AS media_compra_outro,
                SUM(CASE WHEN lote_item.genero = 3 THEN compra.valor ELSE 0 END) AS total_especie_value_outro,
                (SUM(CASE WHEN lote_item.genero = 3 THEN compra.valor ELSE 0 END) / ?) * 100 AS percent_outro,
                COUNT(CASE WHEN lote_item.genero = 3 THEN 1 ELSE NULL END) AS quantidade_outro
            ', [$leilao->valor_total, $leilao->valor_total, $leilao->valor_total, $leilao->valor_total]) 
            ->groupBy('especie.uuid', 'especie.nome')
            ->orderBy('especie.nome')
            ->where('compra.leilao_uuid', $leilaoUuid)
            ->get();
        
        // $imageLogo = base64_encode(Storage::get('public/atual_leiloes_logo.png'));
        // $src = 'data:image/pgn;base64,' . base64_encode(Storage::get('public/atual_leiloes_logo.png'));
        $pdf->loadView('app.mapa.media-especie', ['leilao' => $leilao, 'medias' => $medias]);
        
        return $this->stream($pdf, 'media-especie.pdf');
    }
}