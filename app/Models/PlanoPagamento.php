<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoPagamento extends Model
{
    use HasFactory;

    protected $table = 'plano_pagamento';

    protected $fillable = [
        'uuid',
        'descricao'
    ];
}
