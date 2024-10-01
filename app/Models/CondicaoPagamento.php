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
        'descricao',
        'repeticoes',
        'qtd_parcelas',
        'percentual_comissao_vendedor',
        'percentual_comissao_comprador',
        'incide_comissao_comprador',
        'incide_comissao_vendedor',
        'plano_pagamento_uuid',
    ];

    public function plano_pagamento()
    {
        return $this->hasOne(PlanoPagamento::class);
    }
}
