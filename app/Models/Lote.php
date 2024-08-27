<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'valor_prelance_percentual_valor_estimado'
    ];

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
    * Campos automáticos
    *
    */
    public function getValorComissaoVendaAttribute()
    {
        return $this->lance_vencedor()->valor_comissao_venda;
    }

    public function getValorComissaoCompraAttribute()
    {
        return $this->lance_vencedor()->valor_comissao_compra;
    }

    public function getValorComissaoTotalAttribute()
    {
        return $this->valor_comissao_venda + $this->valor_comissao_compra;
    }

    public function getValorPrelanceAttribute()
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

    public function getValorPrelancePercentualValorEstimadoAttribute()
    {
        return (100 * $this->valor_prelance) / $this->valor_estimado;
    }

    public function getValorPrelanceDiferencaValorEstimadoAttribute()
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
