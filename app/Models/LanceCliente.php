<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanceCliente extends Model
{
    use HasFactory;

    protected $table = "lance";

    protected $fillable = [
        'uuid',
        'leilao_uuid',
        'lote_uuid',
        'lance_uuid',
        'cliente_uuid',
        'cota_percentual',
        'cota_real'
    ];
}
