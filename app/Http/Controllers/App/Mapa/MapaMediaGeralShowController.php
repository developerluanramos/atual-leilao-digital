<?php

namespace App\Http\Controllers\App\Mapa;

use App\Http\Traits\App\GeneratePdfTrait;
use App\Models\Compra;
use App\Models\Leilao;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class MapaMediaGeralShowController
{
    use GeneratePdfTrait;

    public function __construct(

    ) {}

    public function show(string $leilaoUuid, Request $request)
    {
        $mediasPorVendedor = DB::table('lote_vendedor')
            ->select([
                'cliente.uuid as vendedor_uuid',
                'cliente.nome as vendedor_nome',
                // Quantidades por gênero (diretamente do lote)
                DB::raw('SUM(lote.quantidade_macho) as qtd_macho'),
                DB::raw('SUM(lote.quantidade_femea) as qtd_femea'),
                DB::raw('SUM(lote.quantidade_outro) as qtd_outro'),

                // Valores ponderados pelo percentual_cota
                DB::raw('SUM(compra.valor * lote_vendedor.percentual_cota / 100 * lote.quantidade_macho / GREATEST((lote.quantidade_macho + lote.quantidade_femea + lote.quantidade_outro), 1)) as valor_macho'),
                DB::raw('SUM(compra.valor * lote_vendedor.percentual_cota / 100 * lote.quantidade_femea / GREATEST((lote.quantidade_macho + lote.quantidade_femea + lote.quantidade_outro), 1)) as valor_femea'),
                DB::raw('SUM(compra.valor * lote_vendedor.percentual_cota / 100 * lote.quantidade_outro / GREATEST((lote.quantidade_macho + lote.quantidade_femea + lote.quantidade_outro), 1)) as valor_outro'),

                // Totais
                DB::raw('SUM(lote.quantidade_macho + lote.quantidade_femea + lote.quantidade_outro) as total_itens'),
                DB::raw('SUM(compra.valor * lote_vendedor.percentual_cota / 100) as valor_total'),

                // Percentuais
                DB::raw('ROUND(SUM(lote.quantidade_macho) * 100.0 / GREATEST(SUM(lote.quantidade_macho + lote.quantidade_femea + lote.quantidade_outro), 1), 2) as perc_macho'),
                DB::raw('ROUND(SUM(lote.quantidade_femea) * 100.0 / GREATEST(SUM(lote.quantidade_macho + lote.quantidade_femea + lote.quantidade_outro), 1), 2) as perc_femea'),
                DB::raw('ROUND(SUM(lote.quantidade_outro) * 100.0 / GREATEST(SUM(lote.quantidade_macho + lote.quantidade_femea + lote.quantidade_outro), 1), 2) as perc_outro')
            ])
            ->join('cliente', 'lote_vendedor.cliente_uuid', '=', 'cliente.uuid')
            ->join('lote', 'lote_vendedor.lote_uuid', '=', 'lote.uuid')
            ->join('compra', 'compra.lote_uuid', '=', 'lote.uuid')
            ->where('lote.leilao_uuid', $leilaoUuid)
            ->groupBy('cliente.uuid', 'cliente.nome')
            ->orderBy('cliente.nome')
            ->get();


        dd($mediasPorVendedor);
    }
}
