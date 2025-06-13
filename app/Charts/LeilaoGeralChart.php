<?php

namespace App\Charts;

use App\Livewire\Components\App\Charts\LeilaoGeral;
use App\Models\Leilao;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Str;

class LeilaoGeralChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        $leiloes = Leilao::withCount(['lotes', 'prelances', 'clientes', 'compras'])
            ->withSum('lotes', 'valor_final_prelance')
            ->withSum('compras', 'valor')
//            ->orderBy('descricao', 'asc')
//                ->whereIn('uuid', [
//                    '96792ad1-2852-4500-b190-084b79a54e89',
//                    '86803f62-ef84-46d8-940e-717bffc855c2',
//                    'dc990fe6-0100-4da1-8df9-0f0a0cda4237'
//            ])
            ->get();

        $chart = $this->chart->horizontalBarChart()
            ->setTitle('Desempenho dos Leilões')
            ->setSubtitle('Comparativo dos últimos 5 leilões')
            ->addData('Lotes', $leiloes->pluck('lotes_count')->toArray())
            ->addData('Qtd. Pré-lances', $leiloes->pluck('prelances_count')->toArray())
            ->addData('Valor Total Pré-lance (R$)', $leiloes->pluck('lotes_sum_valor_final_prelance')->toArray())
            ->addData('Valor Total Leilão (R$)', $leiloes->pluck('compras_sum_valor')->toArray())
            ->setXAxis($leiloes->pluck('descricao')->map(function($desc) {
                return Str::limit($desc, 30); // Limita a descrição para não quebrar o layout
            })->toArray());
//            ->setOptions([
//                'yAxis' => [
//                    [
//                        'type' => 'value',
//                        'name' => 'Quantidade',
//                        'position' => 'left'
//                    ],
//                    [
//                        'type' => 'value',
//                        'name' => 'Valor (R$)',
//                        'position' => 'right'
//                    ]
//                ],
//                'series' => [
//                    ['yAxisIndex' => 0], // Lotes
//                    ['yAxisIndex' => 0], // Pré-lances
//                    ['yAxisIndex' => 1], // Valor Pré-lance
//                    ['yAxisIndex' => 1]  // Valor Leilão
//                ]
//            ]);

        return $chart;
    }
}
