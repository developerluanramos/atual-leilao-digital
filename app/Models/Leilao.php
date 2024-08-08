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
        'prelance_aberto_em',
        'prelance_fechado_em',
        'promotor_uuid',
        'leiloeiro_uuid',
    ];

    public function promotor()
    {
        return $this->hasOne(Promotor::class, 'uuid', 'promotor_uuid');
    }

    public function leiloeiro()
    {
        return $this->hasOne(Leiloeiro::class, 'uuid', 'leiloeiro_uuid');
    }

    public function lotes()
    {
        return $this->hasMany(Lote::class, 'leilao_uuid', 'uuid');
    }

    public function config_prelance()
    {
        return $this->hasMany(PrelanceConfig::class, 'leilao_uuid', 'uuid');
    }
}
