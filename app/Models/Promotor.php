<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotor extends Model
{
    use HasFactory;

    protected $table = 'promotor';

    protected $fillable = [
        'uuid',
        'nome'
    ];
}
