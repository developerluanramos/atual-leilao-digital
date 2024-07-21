<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $table = 'lote';

    protected $fillable = [
        'uuid',
        'leilao_uuid',
        'plano_pagamento_uuid',
        'condicao_pagamento_uuid',
        'reca_uuid',
        'especie_uuid',
        'valor',
        'incide_comissao_compra',
        'incide_comissao_venda',
    ];
}
