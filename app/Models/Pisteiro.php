<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pisteiro extends Model
{
    use HasFactory;

    protected $table = 'pisteiro';

    protected $fillable = [
        'uuid',
        'nome',
        'email',
        'nascido_em'
    ];
}
