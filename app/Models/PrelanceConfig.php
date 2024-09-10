<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrelanceConfig extends Model
{
    use HasFactory;

    protected $table = 'prelance_config';

    protected $fillable = [
        'uuid',
        'data',
        'cor',
        'plano_pagamento_uuid',
        'leilao_uuid',
        'valor_estimado',
        'valor_minimo',
        'valor_progressao',
        'percentual_progressao'
    ];

    public function plano_pagamento()
    {
        return $this->hasOne(PlanoPagamento::class, 'uuid', 'plano_pagamento_uuid');
    }

    public function leilao()
    {
        return $this->belongsTo(Leilao::class, 'leilao_uuid', 'uuid');
    }
}
