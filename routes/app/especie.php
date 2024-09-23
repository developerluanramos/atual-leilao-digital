<?php

Route::get('especie', [\App\Http\Controllers\App\Especie\EspecieIndexController::class, 'index'])->name('especie.index');
Route::get('especie/create', [\App\Http\Controllers\App\Especie\EspecieCreateController::class, 'create'])->name('especie.create');
Route::post('especie', [\App\Http\Controllers\App\Especie\EspecieStoreController::class, 'store'])->name('especie.store');
Route::get('especie/{uuid}/edit', [\App\Http\Controllers\App\Especie\EspecieEditController::class, 'edit'])->name('especie.edit');
Route::put('especie/{uuid}/update', [\App\Http\Controllers\App\Especie\EspecieUpdateController::class, 'update'])->name('especie.update');
Route::delete('especie/{uuid}', [\App\Http\Controllers\App\Especie\EspecieDeleteController::class, 'delete'])->name('especie.delete');
