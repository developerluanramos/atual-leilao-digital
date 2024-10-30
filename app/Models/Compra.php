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
        'plano_pagamento_uuid',
        'valor',
        'valor_comissao_vendedor',
        'valor_comissao_comprador',
    ];

    public function plano_pagamento()
    {

    }

    public function leilao() 
    {

    }

    public function lote() 
    {

    }

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class, 'compra_cliente', 'compra_uuid', 'cliente_uuid', 'uuid' /* compra.uuid */, 'uuid' /* cliente.uuid */);
    }
}
