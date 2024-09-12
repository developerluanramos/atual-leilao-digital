<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Decimal;

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
        'quantidade',
        'quantidade_macho',
        'quantidade_femea',
        'quantidade_outro',
        'incide_comissao_compra',
        'incide_comissao_venda',
    ];

    protected $dates = ['created_at', 'updated_at'];

    protected $appends = [
        'created_at_for_humans', 
        'updated_at_for_humans',
        'valor_comissao_venda',
        'valor_comissao_compra',
        'valor_comissao_total',
        'valor_prelance',
        'valor_prelance_diferenca_valor_estimado',
        'valor_prelance_percentual_valor_estimado',
        'valor_prelance_calculado'
    ];

    public function leilao()
    {
       return $this->hasOne(Leilao::class, 'uuid', 'leilao_uuid');
    }

    public function plano_pagamento()
    {
       return $this->hasOne(PlanoPagamento::class, 'uuid', 'plano_pagamento_uuid');
    }

    public function itens()
    {
        return $this->hasMany(LoteItem::class, 'lote_uuid', 'uuid');
    }

    public function lances()
    {
        return $this->hasMany(Lance::class, 'lote_uuid', 'uuid');
    }

    public function lance_vencedor()
    {
        return $this->lances->last();
    }


    /*
    * Valor da comissão de vendedor
    *
    * @return mixed
    */
    public function getValorComissaoVendaAttribute(): mixed
    {
        return $this->lance_vencedor()->valor_comissao_venda ?? 0;
    }

    /*
    * Valor da comissão de comprador
    *
    * @return mixed
    */
    public function getValorComissaoCompraAttribute(): mixed
    {
        return $this->lance_vencedor()->valor_comissao_compra ?? 0;
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
    *
    * @return float|int
    */
    public function getValorPrelanceAttribute(): float|int
    {
        if($this->lance_vencedor())
        {
            $valorLanceOriginal = $this->lance_vencedor()->valor;
            $quantidadeClientes = $this->lance_vencedor()->clientes->count() ? $this->lance_vencedor()->clientes->count() : 1;
            $planoPagamento = $this->lance_vencedor()->plano_pagamento;
            $condicoesPagamento = $planoPagamento->condicoes_pagamento()->get();
            $valorLotePreLance = 0;
    
            foreach ($condicoesPagamento as $key => $condicaoPagamento)
            {
                for($i = 0; $i <= $condicaoPagamento['qtd_parcelas']; $i++) {
                    $valorLotePreLance += ($condicaoPagamento['repeticoes'] * ($valorLanceOriginal * $this->itens->count())) / $quantidadeClientes;
                }
            }
    
            return $valorLotePreLance;
        }

        return 0;
        
    }

    /*
    * Valor pré calculado do lance, levando em conta o 
    * valor de progressao ou o percentual de progressao.
    * Primeiro leva em conta o percentual, porém, caso esteja
    * configurado algum valor em reais, este último será considerado.
    *
    * @return float|int
    */
    public function getValorPrelanceCalculadoAttribute(): float|int
    {
        if(!is_null($this->lance_vencedor()) && !is_null($this->leilao()->first()->config_prelance_atual)) {
            $acrescimoValorLance = 0;

            // -- calculo pelo percentual de progressao
            if(!is_null($this->leilao()->first()->config_prelance_atual->percentual_progressao))
            {
                $percentualProgressao = $this->leilao()->first()->config_prelance_atual->percentual_progressao / 100;
                $acrescimoValorLance = $percentualProgressao * $this->lance_vencedor()->valor;
            }
    
            // -- caso tenha valor real configurado, ele substitui o calculo anterior
            if(!is_null($this->leilao()->first()->config_prelance_atual->valor_progressao))
            {
                $acrescimoValorLance = 0;
                $acrescimoValorLance = $this->leilao()->first()->config_prelance_atual->valor_progressao;
            }
    
            return $this->lance_vencedor()->valor + $acrescimoValorLance;
        } 
        
        return $this->leilao()->first()->config_prelance_atual->valor_minimo;
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

    public function getCreatedAtForHumansAttribute()
    {
        return $this->created_at->diffForHumans(Carbon::now());
    }

    public function getUpdatedAtForHumansAttribute()
    {
        return $this->updated_at->diffForHumans(Carbon::now());
    }
}
