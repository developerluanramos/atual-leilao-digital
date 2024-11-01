<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoteItemImagem extends Model
{
    use HasFactory;

    protected $table = "lote_item_imagem";

    protected $fillable = [
        "uuid",
        "lote_item_uuid",
        "descricao",
        "url"
    ];
}
