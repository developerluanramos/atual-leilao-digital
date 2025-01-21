<?php

namespace App\Charts;

use App\Models\Compra;
use App\Models\Leilao;
use App\Models\LoteItem;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LeilaoEspecie
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(Leilao $leilao): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $especieQuantities = LoteItem::join('lote', 'lote_item.lote_uuid', '=', 'lote.uuid')
            ->join('leilao', 'lote.leilao_uuid', '=', 'leilao.uuid')
            ->join('especie', 'lote_item.especie_uuid', '=', 'especie.uuid')
            ->selectRaw('especie.nome, lote_item.especie_uuid, COUNT(*) as quantidade')
            ->groupBy('lote_item.especie_uuid')
            ->orderBy('lote_item.especie_uuid')
            ->where('leilao_uuid', $leilao->uuid)
            ->get()->toArray();

        
        // $totalValue = $leilao->valor_total;
        // $racaResults = Compra::join('lote', 'compra.lote_uuid', '=', 'lote.uuid')
        //     ->join('lote_item', 'lote.uuid', '=', 'lote_item.lote_uuid')
        //     ->join('raca', 'lote_item.raca_uuid', '=', 'raca.uuid') // Assuming a "raca" table exists
        //     ->selectRaw('
        //         raca.uuid AS raca_id,
        //         raca.nome AS raca_nome,
        //         AVG(compra.valor) AS media_compra,
        //         SUM(compra.valor) AS total_raca_value,
        //         (SUM(compra.valor) / ?) * 100 AS percent,
        //         COUNT(compra.id) AS quantidade,
        //         AVG(CASE WHEN lote_item.genero = 1 THEN compra.valor ELSE NULL END) AS media_compra_genero1,
        //         SUM(CASE WHEN lote_item.genero = 1 THEN compra.valor ELSE 0 END) AS total_raca_value_genero1,
        //         (SUM(CASE WHEN lote_item.genero = 1 THEN compra.valor ELSE 0 END) / ?) * 100 AS percent_genero1,
        //         COUNT(CASE WHEN lote_item.genero = 1 THEN 1 ELSE NULL END) AS quantidade_genero1,
        //         AVG(CASE WHEN lote_item.genero = 2 THEN compra.valor ELSE NULL END) AS media_compra_genero2,
        //         SUM(CASE WHEN lote_item.genero = 2 THEN compra.valor ELSE 0 END) AS total_raca_value_genero2,
        //         (SUM(CASE WHEN lote_item.genero = 2 THEN compra.valor ELSE 0 END) / ?) * 100 AS percent_genero2,
        //         COUNT(CASE WHEN lote_item.genero = 2 THEN 1 ELSE NULL END) AS quantidade_genero2,
        //         AVG(CASE WHEN lote_item.genero = 3 THEN compra.valor ELSE NULL END) AS media_compra_genero3,
        //         SUM(CASE WHEN lote_item.genero = 3 THEN compra.valor ELSE 0 END) AS total_raca_value_genero3,
        //         (SUM(CASE WHEN lote_item.genero = 3 THEN compra.valor ELSE 0 END) / ?) * 100 AS percent_genero3,
        //         COUNT(CASE WHEN lote_item.genero = 3 THEN 1 ELSE NULL END) AS quantidade_genero3
        //     ', [$totalValue, $totalValue, $totalValue, $totalValue]) // Use the total value for percentage calculation
        //     ->groupBy('raca.uuid', 'raca.nome')
        //     ->orderBy('raca.nome')
        //     ->where('compra.leilao_uuid', $leilao->uuid)
        //     ->get();
        
        return $this->chart->pieChart()
            ->setTitle('Consolidados de Espécies')
            ->addData(array_column($especieQuantities, "quantidade"))
            ->setToolbar(true, true)
            ->setHeight(175)
            ->setLabels(array_column($especieQuantities, "nome"));
    }
}
