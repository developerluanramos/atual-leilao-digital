<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leilao extends Model
{
    use HasFactory;

    protected $table = 'leilao';

    protected $fillable = [
        'uuid',
        'denominacao',
        'descricao',
        'local',
        'cep',
        'uf',
        'cidade',
        'aberto_em',
        'fechado_em',
        'prelance_aberto_em',
        'prelance_fechado_em',
        'promotor_uuid',
        'leiloeiro_uuid',
    ];

    protected $appends = [
        'valor_comissao_venda',
        'valor_comissao_compra',
        'valor_comissao_total',
        'plano_pagamento_prelance',
        'config_prelance_atual'
    ];

    /*
    * Database relations
    *
    */
    public function promotor()
    {
        return $this->hasOne(Promotor::class, 'uuid', 'promotor_uuid');
    }

    public function leiloeiro()
    {
        return $this->hasOne(Leiloeiro::class, 'uuid', 'leiloeiro_uuid');
    }

    public function lotes()
    {
        return $this->hasMany(Lote::class, 'leilao_uuid', 'uuid');
    }

    public function config_prelance()
    {
        return $this->hasMany(PrelanceConfig::class, 'leilao_uuid', 'uuid');
    }

    public function lances()
    {
        return $this->hasMany(Lance::class, 'leilao_uuid', 'uuid');
    }

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class, 'lance_cliente', 'leilao_uuid', 'cliente_uuid', 'uuid' /* lance.uuid */, 'uuid' /* cliente.uuid */)->distinct('cliente_uuid');
    }

    /*
    * Campos automáticos
    *
    */
    public function getValorComissaoVendaAttribute()
    {
        return $this->lotes->sum('valor_comissao_venda');
    }

    public function getValorComissaoCompraAttribute()
    {
        return $this->lotes->sum('valor_comissao_compra');
    }

    public function getValorComissaoTotalAttribute()
    {
        return $this->valor_comissao_venda + $this->valor_comissao_compra;
    }

    public function getPlanoPagamentoPrelanceAttribute()
    {
        $carbonHoje = Carbon::now();
        $dataHoje = $carbonHoje->toDateString();
        
        $configPrelance = $this->config_prelance()->where('data', $dataHoje)->first();

        if(!empty($configPrelance)) {
            return $configPrelance->plano_pagamento()->first();
        }

        return null;
    }

    public function getConfigPrelanceAtualAttribute()
    {
        $carbonHoje = Carbon::now();
        $dataHoje = $carbonHoje->toDateString();
        
        $configPrelance = $this->config_prelance()->where('data', $dataHoje)->first();

        if(!empty($configPrelance)) {
            return $configPrelance;
        }

        return null;
    }
}
