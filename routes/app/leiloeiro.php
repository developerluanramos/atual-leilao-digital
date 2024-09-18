<?php

Route::get('/leiloeiro', [App\Http\Controllers\App\Leiloeiro\LeiloeiroIndexController::class, 'index'])->name('leiloeiro.index');
Route::get('/leiloeiro/create', [App\Http\Controllers\App\Leiloeiro\LeiloeiroCreateController::class, 'create'])->name('leiloeiro.create');
Route::post('/leiloeiro/create', [App\Http\Controllers\App\Leiloeiro\LeiloeiroStoreController::class, 'store'])->name('leiloeiro.store');
Route::get('/leiloeiro/{uuid}/edit/', [App\Http\Controllers\App\Leiloeiro\LeiloeiroEditController::class, 'edit'])->name('leiloeiro.edit');
Route::put('/leiloeiro/{uuid}/update/', [App\Http\Controllers\App\Leiloeiro\LeiloeiroUpdateController::class, 'update'])->name('leiloeiro.update');
