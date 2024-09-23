<?php

Route::get('raca', [\App\Http\Controllers\App\Raca\RacaIndexController::class, 'index'])->name('raca.index');
Route::get('raca/create', [\App\Http\Controllers\App\Raca\RacaCreateController::class, 'create'])->name('raca.create');
Route::post('raca', [\App\Http\Controllers\App\Raca\RacaStoreController::class, 'store'])->name('raca.store');
Route::get('raca/{uuid}/edit', [\App\Http\Controllers\App\Raca\RacaEditController::class, 'edit'])->name('raca.edit');
Route::put('raca/{uuid}/update', [\App\Http\Controllers\App\Raca\RacaUpdateController::class, 'update'])->name('raca.update');
Route::delete('raca/{uuid}', [\App\Http\Controllers\App\Raca\RacaDeleteController::class, 'delete'])->name('raca.delete');



