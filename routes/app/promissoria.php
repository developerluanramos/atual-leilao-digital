<?php

use App\Models\Compra;
use Barryvdh\DomPDF\Facade\Pdf;

$pdf = Pdf::setOptions([
    'defaultFont' => 'sans-serif',
    'enable-javascript' => true,
    'images' => true
]);

$pdf->setOption('isRemoteEnabled', true);

Route::get('promissoria/via-cliente', [\App\Http\Controllers\App\Promissoria\PromissoriaViaClienteController::class, 'promissoriaCliente'])->name('promissoria.via-cliente');

// Route::get('promissoria/via-cliente', function() use ($pdf) {
    
//     $pdf->loadView('app.promissoria.cliente', [
//         'compra' => Compra::with([
//             'vendedor',
//             'cliente',
//             'lote.itens.raca',
//             'lote.itens.especie',
//             'leilao.leiloeiro'
//         ])->find(1)
//     ]);
    
//     return $pdf->stream('promissoria-cliente.pdf');

// })->name('promissoria.via-cliente');

Route::get('promissoria/via-vendedor', function() use ($pdf) {
    
    $pdf->loadView('app.promissoria.vendedor', [
        'compra' => Compra::with([
            'vendedor',
            'cliente',
            'lote.itens.raca',
            'lote.itens.especie',
            'leilao.leiloeiro'
        ])->find(1)
    ]);
    
    return $pdf->stream('promissoria-vendedor.pdf');

})->name('promissoria.via-vendedor');

Route::get('promissoria/via-interna', function() use ($pdf) {
    
    $pdf->loadView('app.promissoria.interna', [
        'compra' => Compra::with([
            'vendedor',
            'cliente',
            'lote.itens.raca',
            'lote.itens.especie',
            'leilao.leiloeiro'
        ])->find(1)
    ]);
    
    return $pdf->stream('promissoria-interna.pdf');

})->name('promissoria.via-interna');