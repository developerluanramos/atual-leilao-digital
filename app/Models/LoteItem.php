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
        'quantidade',
        'quantidade_macho',
        'quantidade_femea',
        'quantidade_outros',
        'lote_uuid',
        'raca_uuid',
        'especie_uuid',
        'valor',
        'inside_comissao_compra',
        'incide_comissao_venda',
    ];
}
