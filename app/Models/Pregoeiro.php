<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregoeiro extends Model
{
    use HasFactory;

    protected $table = 'pregoeiros';
    
    protected $fillable = [
        'uuid',
        'nome',
        'email',
        'nascido_em'
    ];
}
