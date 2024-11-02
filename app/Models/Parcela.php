<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    use HasFactory;

    protected $table = 'parcela';

    protected $fillable = [
        'uuid',
        'numero',
        'compra_uuid',
        'cliente_uuid',
        'lote_uuid',
        'leilao_uuid',
        'vencimento_em',
        'valor',
        'valor_comissao_vendedor',
        'valor_comissao_comprador',
        'percentual_comissao_vendedor',
        'percentual_comissao_comprador',
        'incide_comissao_venda',
        'incide_comissao_compra',
        'repeticoes',
        'status'
    ];
}