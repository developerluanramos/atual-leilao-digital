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
        'descricao',
        'leilao_uuid',
        'plano_pagamento_uuid',
        'valor_estimado',
        'quantidade',
        'quantidade_macho',
        'quantidade_femea',
        'quantidade_outro',
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

    public function itens()
    {
        return $this->hasMany(LoteItem::class, 'lote_uuid', 'uuid');
    }

    public function lances()
    {
        return $this->hasMany(Lance::class, 'lote_uuid', 'uuid');
    }

    public function lance_vencedor()
    {
        return $this->lances->last();
    }
}
