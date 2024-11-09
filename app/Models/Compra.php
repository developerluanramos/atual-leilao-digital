<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compra';

    protected $fillable = [
        'uuid',
        'leilao_uuid',
        'lote_uuid',
        'cliente_uuid',
        'vendedor_uuid',
        'plano_pagamento_uuid',
        'valor',
        'valor_lance',
        'valor_comissao_vendedor',
        'valor_comissao_comprador',
        'percentual_cota',
        'percentual_cota_vendedor'
    ];

    public function plano_pagamento()
    {
        return $this->hasOne(PlanoPagamento::class, 'uuid', 'plano_pagamento_uuid');
    }

    public function leilao() 
    {
        return $this->hasOne(Leilao::class, 'uuid', 'leilao_uuid');
    }

    public function lote() 
    {
        return $this->hasOne(Lote::class, 'uuid', 'lote_uuid');
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'uuid', 'cliente_uuid');
    }

    public function vendedor()
    {
        return $this->hasOne(Cliente::class, 'uuid', 'vendedor_uuid');
    }

    public function parcelas()
    {
        return $this->hasMany(Parcela::class, 'compra_uuid', 'uuid');
    }

    // public function clientes()
    // {
    //     return $this->belongsToMany(Cliente::class, 'compra_cliente', 'compra_uuid', 'cliente_uuid', 'uuid' /* compra.uuid */, 'uuid' /* cliente.uuid */);
    // }
}
