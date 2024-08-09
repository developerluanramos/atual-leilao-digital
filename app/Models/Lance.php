<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lance extends Model
{
    use HasFactory;

    protected $table = "lance";

    protected $fillable = [
        'uuid',
        'leilao_uuid',
        'lote_uuid',
        'plano_pagamento_uuid',
        'realizado_em',
        'valor'
    ];
}
