<?php

Route::get('pisteiro', [\App\Http\Controllers\App\Pisteiro\PisteiroIndexController::class, 'index'])->name('pisteiro.index');
Route::get('pisteiro/create', [\App\Http\Controllers\App\Pisteiro\PisteiroCreateController::class, 'create'])->name('pisteiro.create');
Route::post('pisteiro', [\App\Http\Controllers\App\Pisteiro\PisteiroStoreController::class, 'store'])->name('pisteiro.store');
Route::get('pisteiro/{uuid}/edit', [\App\Http\Controllers\App\Pisteiro\PisteiroEditController::class, 'edit'])->name('pisteiro.edit');
Route::put('pisteiro/{uuid}/update', [\App\Http\Controllers\App\Pisteiro\PisteiroUpdateController::class, 'update'])->name('pisteiro.update');
