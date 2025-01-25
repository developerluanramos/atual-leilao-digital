<?php

namespace App\Livewire\Components\App;

use App\Enums\TipoLanceEnum;
use App\Models\Leilao;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PreLanceVisaoGeral extends Component
{
    public Leilao $leilao;
    public $lotesLanceVencedor;
    public $clientesVencedores;

    public function mount(Leilao $leilao)
    {
        $this->leilao = $leilao;

        $this->clientesVencedores = DB::table('cliente')
            ->select(
                'cliente.uuid as cliente_uuid',
                'cliente.nome',
                DB::raw('SUM(lance.valor / subquery.cliente_count) as total_gasto'),
                DB::raw('COUNT(DISTINCT lote.uuid) as total_lotes'),
                DB::raw('GROUP_CONCAT(DISTINCT lote.numero ORDER BY lote.numero ASC) as lotes_vencendo')
            )
            ->join('lance_cliente', 'cliente.uuid', '=', 'lance_cliente.cliente_uuid')
            ->join('lance', 'lance_cliente.lance_uuid', '=', 'lance.uuid')
            ->join('lote', 'lance.lote_uuid', '=', 'lote.uuid')
            ->join('leilao', 'lote.leilao_uuid', '=', 'leilao.uuid')
            ->joinSub(
                DB::table('lance as l1')
                    ->select('l1.lote_uuid', DB::raw('MAX(l1.valor) as maior_valor'))
                    ->join('lote', 'l1.lote_uuid', '=', 'lote.uuid')
                    ->groupBy('l1.lote_uuid'),
                'subquery_lances',
                function ($join) {
                    $join->on('subquery_lances.lote_uuid', '=', 'lance.lote_uuid')
                        ->on('subquery_lances.maior_valor', '=', 'lance.valor');
                }
            )
            ->joinSub(
                DB::table('lance_cliente')
                    ->select('lance_cliente.lance_uuid', DB::raw('COUNT(lance_cliente.cliente_uuid) as cliente_count'))
                    ->groupBy('lance_cliente.lance_uuid'),
                'subquery',
                'subquery.lance_uuid',
                '=',
                'lance.uuid'
            )
            ->where('leilao.uuid', $this->leilao->uuid)
            ->groupBy('cliente.uuid', 'cliente.nome')
            ->orderBy('total_gasto', 'desc')
            ->orderBy('total_lotes', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.components.app.pre-lance-visao-geral');
    }
}
