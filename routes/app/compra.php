<?php

Route::get('compra/create', [\App\Http\Controllers\App\Compra\CompraCreateController::class, 'create'])->name('compra.create');
Route::get('compra/store', [\App\Http\Controllers\App\Compra\CompraStoreController::class, 'store'])->name('compra.store');
