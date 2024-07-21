<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CondicaoPagamento extends Model
{
    use HasFactory;

    protected $table = 'condicao_pagamento';

    protected $fillable = [
        'uuid',
        'repeticoes',
        'qtd_parcelas',
        'percentual_comissao_vendedor',
        'percentual_comissao_comprador',
        'plano_pagamento_uuid',
    ];
}
