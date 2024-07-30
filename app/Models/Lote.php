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
        'leilao_uuid',
        'plano_pagamento_uuid',
        'condicao_pagamento_uuid',
        'reca_uuid',
        'especie_uuid',
        'valor',
        'incide_comissao_compra',
        'incide_comissao_venda',
    ];

    protected $dates = ['created_at', 'updated_at'];

    protected $appends = [
        'created_at_for_humans', 'updated_at_for_humans'
    ];

    public function getCreatedAtForHumansAttribute()
    {
        return $this->created_at->diffForHumans(Carbon::now());
    }

    public function getUpdatedAtForHumansAttribute()
    {
        return $this->updated_at->diffForHumans(Carbon::now());
    }

    public function plano_pagamento()
    {
       return $this->hasOne(PlanoPagamento::class, 'uuid', 'plano_pagamento_uuid');
    }

    public function condicao_pagamento()
    {
        return $this->hasOne(CondicaoPagamento::class, 'uuid', 'condicao_pagamento_uuid');
    }
}
