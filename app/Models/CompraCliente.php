<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraCliente extends Model
{
    use HasFactory;

    protected $table = "compra_cliente";

    protected $fillable = [
        "uuid",
        "cota_percentual",
        "compra_uuid",
        "cliente_uuid"
    ];
}
