<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leilao extends Model
{
    use HasFactory;

    protected $table = 'leilao';

    protected $fillable = [
        'uuid',
        'denominacao',
        'descricao',
        'local',
        'cep',
        'uf',
        'cidade',
        'aberto_em',
        'fechado_em',
        'promotor_uuid',
        'leiloeiro_uuid',
    ];

}
