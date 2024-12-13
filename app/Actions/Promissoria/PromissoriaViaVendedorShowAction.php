<?php

namespace App\Actions\Promissoria;

use App\DTO\Promissoria\PromissoriaViaVendedorShowDTO;
use App\Models\Compra;
use Barryvdh\DomPDF\Facade\Pdf;

class PromissoriaViaVendedorShowAction
{
    public function __construct() {}

    public function exec(PromissoriaViaVendedorShowDTO $dto): Compra
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