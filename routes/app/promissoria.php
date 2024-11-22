<?php

Route::get('promissoria/via-cliente', [\App\Http\Controllers\App\Promissoria\PromissoriaViaClienteController::class, 'promissoriaCliente'])->name('promissoria.via-cliente');
Route::get('promissoria/via-vendedor', [\App\Http\Controllers\App\Promissoria\PromissoriaViaVendedorController::class, 'promissoriaVendedor'])->name('promissoria.via-vendedor');
Route::get('promissoria/via-interna', [\App\Http\Controllers\App\Promissoria\PromissoriaViaInternaController::class, 'promissoriaInterna'])->name('promissoria.via-interna');
