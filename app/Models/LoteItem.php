<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoteItem extends Model
{
    use HasFactory;

    protected $table = 'lote_item';

    protected $fillable = [
        'uuid',
        'descricao',
        'genero',
        'lote_uuid',
        'raca_uuid',
        'especie_uuid',
        'valor_estimado',
        'inside_comissao_compra',
        'incide_comissao_venda',
    ];

    public function raca()
    {
        return $this->hasOne(Raca::class, 'uuid', 'raca_uuid');
    }

    public function especie()
    {
        return $this->hasOne(Especie::class, 'uuid', 'especie_uuid');
    }
}
