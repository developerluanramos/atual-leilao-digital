<?php

Route::get('/leiloeiro', [App\Http\Controllers\App\Leiloeiro\LeiloeiroIndexController::class, 'index'])->name('leiloeiro.index');
Route::get('/leiloeiro/create', [App\Http\Controllers\App\Leiloeiro\LeiloeiroCreateController::class, 'create'])->name('leiloeiro.create');
Route::post('/leiloeiro/create', [App\Http\Controllers\App\Leiloeiro\LeiloeiroStoreController::class, 'store'])->name('leiloeiro.store');
