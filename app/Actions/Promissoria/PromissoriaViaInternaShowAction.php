<?php

namespace App\Actions\Promissoria;

use App\DTO\Promissoria\PromissoriaViaInternaShowDTO;
use App\Models\Compra;

class PromissoriaViaInternaShowAction
{
    public function __construct() {}

    public function exec(PromissoriaViaInternaShowDTO $dto): Compra
    {
        return Compra::with([
            'vendedor',
            'cliente',
            'lote.itens.raca',
            'lote.itens.especie',
            'leilao.leiloeiro'
        ])->where('uuid', $dto->compraUuid)->firstOrFail();
    }
}