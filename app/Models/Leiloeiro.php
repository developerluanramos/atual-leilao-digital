<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leiloeiro extends Model
{
    use HasFactory;

    protected $table = 'leiloeiro';

    protected $fillable = [
        'uuid',
        'nome',
        'email',
        'nascido_em'
    ];
}
