<?php

namespace App\Models;

use App\Enums\TipoLanceEnum;
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
        'pregoeiro_uuid',
        'leiloeiro_uuid',
    ];

    protected $appends = [
        'valor_prelance_comissao_venda',
        'valor_prelance_comissao_compra',
        'valor_prelance_comissao_total',
        'plano_pagamento_prelance',
        'config_prelance_atual'
    ];

    // protected $dates = [
    //     'aberto_em',
    //     'fechado_em',
    //     'prelance_aberto_em',
    //     'prelance_fechado_em',
    // ]; 
    
    // protected $casts = [
    //     'aberto_em' => "date:Y-m-d",
    //     'fechado_em' => "date:Y-m-d",
    //     'prelance_aberto_em' => "date:Y-m-d",
    //     'prelance_fechado_em' => "date:Y-m-d",
    // ];

    /*
    * Database relations
    *
    */
    public function promotor()
    {
        return $this->hasOne(Promotor::class, 'uuid', 'promotor_uuid');
    }

    public function pregoeiro()
    {
        return $this->hasOne(Pregoeiro::class, 'uuid', 'pregoeiro_uuid');
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
        return $this->hasMany(Lance::class, 'leilao_uuid', 'uuid')->where('tipo', (string)TipoLanceEnum::LANCE);
    }

    public function prelances()
    {
        return $this->hasMany(Lance::class, 'leilao_uuid', 'uuid')->where('tipo', (string)TipoLanceEnum::PRELANCE);
    }

    // -- clientes no pré-lance, depois é necessário renomear este método
    public function clientes()
    {
        return $this->belongsToMany(Cliente::class, 'lance_cliente', 'leilao_uuid', 'cliente_uuid', 'uuid' /* lance.uuid */, 'uuid' /* cliente.uuid */)->distinct('cliente_uuid');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'leilao_uuid', 'uuid');
    }

    /*
    * Campos automáticos
    *
    */
    public function getValorPrelanceComissaoVendaAttribute()
    {
        return $this->lotes->sum('valor_prelance_comissao_venda');
    }

    public function getValorPrelanceComissaoCompraAttribute()
    {
        return $this->lotes->sum('valor_prelance_comissao_compra');
    }

    public function getValorPrelanceComissaoTotalAttribute()
    {
        return $this->valor_prelance_comissao_venda + $this->valor_prelance_comissao_compra;
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
