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
        'observacoes',
        'codigo_identificacao',
        'cor'
    ];

    public function raca()
    {
        return $this->hasOne(Raca::class, 'uuid', 'raca_uuid');
    }

    public function especie()
    {
        return $this->hasOne(Especie::class, 'uuid', 'especie_uuid');
    }

    public function imagens()
    {
        return $this->hasMany(LoteItemImagem::class, 'lote_item_uuid', 'uuid');
    }

    public function videos()
    {
        return $this->hasMany(LoteItemVideo::class, 'lote_item_uuid', 'uuid');
    }
}
