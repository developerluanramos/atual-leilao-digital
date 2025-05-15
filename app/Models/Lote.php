<?php

namespace App\Models;

use App\Enums\TipoLanceEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Schema;

class Lote extends Model
{
    use HasFactory;

    protected $table = 'lote';

    protected $fillable = [
        'uuid',
        'descricao',
        'leilao_uuid',
        'plano_pagamento_uuid',
        'valor_estimado',
        'valor_minimo_prelance',
        'valor_final_prelance',
        'status', // aberto / Fechado
        'quantidade', // -- desconsiderar
        'quantidade_macho', // -- desconsiderar
        'quantidade_femea', // -- desconsiderar
        'quantidade_outro', // -- desconsiderar
        'incide_comissao_compra',
        'incide_comissao_venda',
        'multiplicador',
        'ordem_entrada',
        'numero',
        'observacoes'
    ];

    protected $dates = ['created_at', 'updated_at'];

    protected $appends = [
        'created_at_for_humans',
        'updated_at_for_humans',
        'quantidade_prelances',
        'valor_prelance_comissao_venda',
        'valor_prelance_comissao_compra',
        'valor_prelance_comissao_total',
        'valor_prelance',
        'prelance_vencedor',
        'valor_prelance_diferenca_valor_estimado',
        'valor_prelance_percentual_valor_estimado',
        'valor_prelance_calculado',
        'valor_total',
        'valor_comissao_venda',
        'valor_comissao_compra',
        'valor_comissao_total',
    ];

    public function leilao()
    {
       return $this->hasOne(Leilao::class, 'uuid', 'leilao_uuid');
    }

    public function vendedores()
    {
        $table_name = (new LoteVendedor())->getTable();

        $table_fields = Schema::getColumnListing($table_name);

        return $this->belongsToMany(
            Cliente::class,
            'lote_vendedor',
'lote_uuid',
'cliente_uuid',
'uuid' /* lote.uuid */,
'uuid' /* cliente.uuid */)->withPivot($table_fields);
    }

    public function plano_pagamento()
    {
       return $this->hasOne(PlanoPagamento::class, 'uuid', 'plano_pagamento_uuid');
    }

    public function itens()
    {
        return $this->hasMany(LoteItem::class, 'lote_uuid', 'uuid');
    }

    public function prelances(): HasMany
    {
        return $this->hasMany(Lance::class, 'lote_uuid', 'uuid')->with('prelance_config')->where('tipo', (string)TipoLanceEnum::PRELANCE);
    }

    public function prelance_vencedor()
    {
        return $this->prelances->last();
    }

    public function lances()
    {
        return $this->hasMany(Lance::class, 'lote_uuid', 'uuid');
    }

    public function lance_vencedor()
    {
        return $this->lances->last();
    }

    public function compras(): HasMany
    {
        return $this->hasMany(Compra::class, 'lote_uuid', 'uuid');
    }

    /*
    * Valor da comissão de vendedor
    *
    * @return mixed
    */
    public function getQuantidadePrelancesAttribute(): mixed
    {
        return $this->prelances()->get()->count() ?? 0;
    }

    /*
    * Valor da comissão de vendedor
    *
    * @return mixed
    */
    public function getValorPrelanceComissaoVendaAttribute(): mixed
    {
        return $this->prelance_vencedor()->valor_comissao_venda ?? 0;
    }

    /*
    * Valor da comissão de comprador
    *
    * @return mixed
    */
    public function getValorPrelanceComissaoCompraAttribute(): mixed
    {
        return $this->prelance_vencedor()->valor_comissao_compra ?? 0;
    }

    /*
    * Valor total da comissão
    *
    * @return mixed
    */
    public function getValorPrelanceComissaoTotalAttribute(): mixed
    {
        return $this->valor_prelance_comissao_venda + $this->valor_prelance_comissao_compra;
    }

    /*
    * Valor da comissão de vendedor
    *
    * @return mixed
    */
    public function getValorComissaoVendaAttribute(): mixed
    {
        return $this->compras()->sum('valor_comissao_vendedor');
    }

    /*
    * Valor da comissão de comprador
    *
    * @return mixed
    */
    public function getValorComissaoCompraAttribute(): mixed
    {
        return $this->compras()->sum('valor_comissao_comprador');
    }

    /*
    * Valor total da comissão
    *
    * @return mixed
    */
    public function getValorComissaoTotalAttribute(): mixed
    {
        return $this->valor_comissao_venda + $this->valor_comissao_compra;
    }

    /*
    * Valor total atribuido ao lote durante o pré-lance
    * (obtido por meio do lance vencedor)
    *
    * @return float|int
    */
    public function getValorPrelanceAttribute(): float|int
    {
        if($this->prelance_vencedor())
        {
            $valorLanceOriginal = $this->prelance_vencedor()->valor;
            $quantidadeClientes = $this->prelance_vencedor()->clientes->count() ? $this->prelance_vencedor()->clientes->count() : 1;
            if($this->uuid == "f1a75847-4976-4737-a80d-4a061440edac") {
                $planoPagamento = $this->plano_pagamento()->first();
                $condicoesPagamento = $this->plano_pagamento()->first()->condicoes_pagamento()->get()->toArray();
            } else {
                $planoPagamento = $this->prelance_vencedor()->plano_pagamento;
                $condicoesPagamento = $planoPagamento->condicoes_pagamento()->get();
            }

            $valorLotePreLance = 0;

            foreach ($condicoesPagamento as $key => $condicaoPagamento)
            {
                for($i = 1; $i <= $condicaoPagamento['qtd_parcelas']; $i++) {
                    $valorLotePreLance += ($condicaoPagamento['repeticoes'] * ($valorLanceOriginal * $this->multiplicador)) / $quantidadeClientes;
                }
            }

            return $valorLotePreLance;
        }

        return 0;
    }

    /*
    * prelance que está vencendo o prelance
    *
    * @return array
    */
    public function getPrelanceVencedorAttribute(): array
    {
        if($this->prelance_vencedor())
        {
            return $this->prelance_vencedor()->toArray();
        }

        return [];
    }


    /*
    * Valor pré calculado do lance, levando em conta o
    * valor de progressao ou o percentual de progressao.
    * Primeiro leva em conta o percentual, porém, caso esteja
    * configurado algum valor em reais, este último será considerado.
    *
    * (isto é utilizado pra determinar o valor do próximo lance a ser ofertado no lote)
    *
    * @return float|int
    */
    public function getValorPrelanceCalculadoAttribute(): float|int
    {
        if(!is_null($this->prelance_vencedor()) && !is_null($this->leilao()->first()->config_prelance_atual)) {
            $acrescimoValorLance = 0;

            // -- calculo pelo percentual de progressao
            if(!is_null($this->leilao()->first()->config_prelance_atual->percentual_progressao))
            {
                $percentualProgressao = $this->leilao()->first()->config_prelance_atual->percentual_progressao / 100;
                $acrescimoValorLance = $percentualProgressao * $this->prelance_vencedor()->valor;
            }

            // -- caso tenha valor real configurado, ele substitui o calculo anterior
            if(!is_null($this->leilao()->first()->config_prelance_atual->valor_progressao))
            {
                $acrescimoValorLance = 0;
                $acrescimoValorLance = $this->leilao()->first()->config_prelance_atual->valor_progressao;
            }

            return $this->prelance_vencedor()->valor + $acrescimoValorLance;
        }

        return $this->leilao()?->first()?->config_prelance_atual?->valor_minimo ?? 0;
    }

    /**
     * percentual atingido do valor estimado para o lote
     * em relação ao valor atual do lote (o quanto o valor atual do lote atingiu
     * em percentual o valor que havia sido estimado para este lote)
     *
     * @return float|int
     */
    public function getValorPrelancePercentualValorEstimadoAttribute(): float|int
    {
        return (100 * $this->valor_prelance) / $this->valor_estimado;
    }

    /**
     * diferença entre o valor estimado e o valor do lote atual
     *
     * @return float | int
     */
    public function getValorPrelanceDiferencaValorEstimadoAttribute(): float|int
    {
        return $this->valor_prelance - $this->valor_estimado;
    }

    /**
     * valor total do lote baseado nas compras realizadas nele
     *
     * @return float | int
     */
    public function getValorTotalAttribute(): float|int
    {
        return $this->compras()->sum('valor');
    }


    public function getCreatedAtForHumansAttribute()
    {
        return $this->created_at->diffForHumans(Carbon::now());
    }

    public function getUpdatedAtForHumansAttribute()
    {
        return $this->updated_at->diffForHumans(Carbon::now());
    }
}
