<?php

Route::get('promissoria/via-cliente', [\App\Http\Controllers\App\Promissoria\PromissoriaViaClienteShowController::class, 'promissoriaCliente'])->name('promissoria.via-cliente');
Route::get('promissoria/via-vendedor', [\App\Http\Controllers\App\Promissoria\PromissoriaViaVendedorShowController::class, 'promissoriaVendedor'])->name('promissoria.via-vendedor');
Route::get('promissoria/via-interna', [\App\Http\Controllers\App\Promissoria\PromissoriaViaInternaShowController::class, 'promissoriaInterna'])->name('promissoria.via-interna');
