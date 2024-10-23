<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';

    protected $fillable = [
        'uuid',
        'nome',
        'cpf_cnpj',
        'endereco',
        'cep',
        'cidade',
        'uf',
        'celular',
        'numero',
        'complemento',
        'email',
        'site',
    ];

    public function lances()
    {
        return $this->belongsToMany(Lance::class, 'lance_cliente', 'cliente_uuid', 'lance_uuid', 'uuid', 'uuid');
    }

    public function propriedades()
    {
        return $this->hasMany(Propriedade::class, 'cliente_uuid', 'uuid');
    }

    public function contatos()
    {
        return $this->hasMany(Contato::class, 'cliente_uuid', 'uuid');
    }
}
