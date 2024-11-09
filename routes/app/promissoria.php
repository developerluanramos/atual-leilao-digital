<?php

use App\Models\Compra;
use App\Models\Leilao;
use Barryvdh\DomPDF\Facade\Pdf;
Route::get('promissoria/via-cliente', function() {
    $pdf = Pdf::setOptions([
        'defaultFont' => 'sans-serif',
        'enable-javascript' => true,
        'images' => true
    ]);
    
    $pdf->loadView('app.promissoria.cliente', [
        'compra' => Compra::with([
            'cliente',
            'lote.itens.raca',
            'lote.itens.especie',
            'leilao.leiloeiro'
        ])->find(7)
    ]);
    $pdf->setOption('isRemoteEnabled', true);
    // $pdf->download('promissoria-cliente.pdf');
    return $pdf->stream('promissoria-cliente.pdf');
})->name('promissoria.via-cliente');
// Route::get('promissoria/via-vendedor', [\App\Http\Controllers\App\Prelance\PrelanceCreateController::class, 'create'])->name('prelance.create');
// Route::get('promissoria/via-interna', [\App\Http\Controllers\App\Prelance\PrelanceStoreController::class, 'store'])->name('prelance.store');