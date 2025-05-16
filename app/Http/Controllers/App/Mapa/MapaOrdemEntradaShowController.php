<?php

namespace App\Http\Controllers\App\Mapa;

use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Leilao;
use App\Models\Lote;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class MapaOrdemEntradaShowController
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

        $leilao = Leilao::with('leiloeiro', 'promotor')
            ->where('uuid', $leilaoUuid)
            ->first();

        $lotes = Lote::where('leilao_uuid', $leilaoUuid)->orderBy('ordem_entrada')
            ->orderBy('numero')->get();

        $pdf = Pdf::setOptions($options)
            ->loadView('app.mapa.ordem-entrada', [
                'leilao' => $leilao,
                'lotes' => $lotes,
            ]);

        return $pdf->stream('ordem-entrada.pdf');


    }
}
