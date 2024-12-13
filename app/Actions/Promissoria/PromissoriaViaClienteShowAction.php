<?php

namespace App\Actions\Promissoria;

use App\DTO\Promissoria\PromissoriaViaClienteShowDTO;
use App\Models\Compra;

class PromissoriaViaClienteShowAction
{
    public function __construct() {}

    public function exec(PromissoriaViaClienteShowDTO $dto): Compra
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