<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoteVendedor extends Model
{
    use HasFactory;
    protected $table = 'lote_vendedor';

    protected $fillable = [
        "lote_uuid", 
        "cliente_uuid", 
        "percentual_cota"
    ];
}
