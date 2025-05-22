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

        $vendasPorVendedor = DB::table('lote_vendedor')
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

        $vendasPorRaca = Compra::with(['lote.itens.raca'])
            ->where('leilao_uuid', $leilaoUuid)
            ->get()
            ->groupBy(function($compra) {
                return $compra->lote->itens->first()->raca->uuid;
            })
            ->map(function ($compras, $racaUuid) {
                $raca = $compras->first()->lote->itens->first()->raca;
                $lotes = $compras->pluck('lote')->unique();

                // Cálculo dos valores por gênero
                $valoresGenero = $compras->map(function ($compra) {
                    $lote = $compra->lote;
                    $totalItensLote = max(1, $lote->quantidade_macho + $lote->quantidade_femea + $lote->quantidade_outro);

                    return [
                        'valor_macho' => $compra->valor * ($lote->quantidade_macho / $totalItensLote),
                        'valor_femea' => $compra->valor * ($lote->quantidade_femea / $totalItensLote),
                        'valor_outro' => $compra->valor * ($lote->quantidade_outro / $totalItensLote)
                    ];
                })->reduce(function ($carry, $item) {
                    $carry['total_valor_macho'] = ($carry['total_valor_macho'] ?? 0) + $item['valor_macho'];
                    $carry['total_valor_femea'] = ($carry['total_valor_femea'] ?? 0) + $item['valor_femea'];
                    $carry['total_valor_outro'] = ($carry['total_valor_outro'] ?? 0) + $item['valor_outro'];
                    return $carry;
                }, []);

                $qtdTotal = $lotes->sum('quantidade_macho') + $lotes->sum('quantidade_femea') + $lotes->sum('quantidade_outro');
                return [
                    'raca_uuid' => $racaUuid,
                    'raca_nome' => $raca->nome,
                    'total_vendas' => $compras->count(),
                    'valor_total' => $compras->sum('valor'),
                    'valor_medio_total' => $compras->sum('valor') / $qtdTotal,
                    'qtd_macho' => $lotes->sum('quantidade_macho'),
                    'qtd_femea' => $lotes->sum('quantidade_femea'),
                    'qtd_outro' => $lotes->sum('quantidade_outro'),
                    'qtd_total' => $qtdTotal,
                    'valor_macho' => $valoresGenero['total_valor_macho'] ?? 0,
                    'valor_femea' => $valoresGenero['total_valor_femea'] ?? 0,
                    'valor_outro' => $valoresGenero['total_valor_outro'] ?? 0,
                    'media_macho' => $valoresGenero['total_valor_macho'] / $lotes->sum('quantidade_macho'),
                    'media_femea' => $valoresGenero['total_valor_femea'] / $lotes->sum('quantidade_femea'),
                    'media_outro' => $lotes->sum('quantidade_outro') > 0
                        ? $valoresGenero['total_valor_outro'] / $lotes->sum('quantidade_outro')
                        : 0,
                    'media_total' => ($valoresGenero['total_valor_macho'] / $lotes->sum('quantidade_macho')) + ($valoresGenero['total_valor_femea'] / $lotes->sum('quantidade_femea')) + ($valoresGenero['total_valor_outro'] / $qtdTotal)
                ];
            })
            ->sortByDesc('valor_total')
            ->values();

        $leilao = Leilao::where('uuid', $leilaoUuid)->first();

        $pdf->loadView('app.mapa.media-geral', [
            'leilao' => $leilao,
            'vendasPorVendedor' => $vendasPorVendedor,
            'vendasPorRaca' => $vendasPorRaca
        ])->setPaper('a4', 'landscape');

        return $this->stream($pdf, 'media-geral.pdf');

    }
}
