<?php

namespace App\Actions\Promissoria;

use App\DTO\Promissoria\PromissoriaViaVendedorDTO;
use App\Models\Compra;
use Barryvdh\DomPDF\Facade\Pdf;

class PromissoriaViaVendedorAction
{
    public function __construct() {}

    public function exec(PromissoriaViaVendedorDTO $dto)
    {
        $pdf = Pdf::setOptions([
            'defaultFont' => 'sans-serif',
            'enable-javascript' => true,
            'images' => true
        ]);

        $pdf->setOption('isRemoteEnabled', true);

        $pdf->loadView('app.promissoria.vendedor', [
            'compra' => Compra::with([
                'vendedor',
                'cliente',
                'lote.itens.raca',
                'lote.itens.especie',
                'leilao.leiloeiro'
            ])->where('uuid', $dto->compraUuid)->firstOrFail()
        ]);
        
        return $pdf->stream('promissoria-vendedor.pdf');
    }
}