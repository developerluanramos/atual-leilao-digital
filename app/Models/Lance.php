<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lance extends Model
{
    use HasFactory;

    protected $table = "lance";

    protected $fillable = [
        'uuid',
        'leilao_uuid',
        'lote_uuid',
        'prelance_config_uuid',
        'plano_pagamento_uuid',
        'realizado_em',
        'valor',
        'valor_comissao_compra',
        'valor_comissao_venda'
    ];

    public function lote()
    {
        return $this->belongsTo(Lote::class, 'lote_uuid', 'uuid');
    }

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class, 'lance_cliente', 'lance_uuid', 'cliente_uuid', 'uuid' /* lance.uuid */, 'uuid' /* cliente.uuid */);
    }

    public function prelance_config()
    {
        return $this->hasOne(PrelanceConfig::class, 'uuid', 'prelance_config_uuid');
    }

    public function plano_pagamento()
    {
        return $this->hasOne(PlanoPagamento::class, 'uuid', 'plano_pagamento_uuid');
    }
}
