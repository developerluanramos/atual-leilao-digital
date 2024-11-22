<?php

namespace App\Actions\Promissoria;

use App\DTO\Promissoria\PromissoriaViaInternaDTO;
use App\Models\Compra;
use Barryvdh\DomPDF\Facade\Pdf;

class PromissoriaViaInternaAction
{
    public function __construct() {}

    public function exec(PromissoriaViaInternaDTO $dto)
    {
        $pdf = Pdf::setOptions([
            'defaultFont' => 'sans-serif',
            'enable-javascript' => true,
            'images' => true
        ]);

        $pdf->setOption('isRemoteEnabled', true);

        $pdf->loadView('app.promissoria.interna', [
            'compra' => Compra::with([
                'vendedor',
                'cliente',
                'lote.itens.raca',
                'lote.itens.especie',
                'leilao.leiloeiro'
            ])->where('uuid', $dto->compraUuid)->firstOrFail()
        ]);
        
        return $pdf->stream('promissoria-interna.pdf');
    }
}