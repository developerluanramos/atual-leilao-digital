<?php

Route::get('cliente', [App\Http\Controllers\App\Cliente\ClienteIndexController::class, 'index'])->name('cliente.index');
Route::get('cliente/create', [App\Http\Controllers\App\Cliente\ClienteCreateController::class, 'create'])->name('cliente.create');
Route::get('cliente/{uuid}/edit', [App\Http\Controllers\App\Cliente\ClienteEditController::class, 'edit'])->name('cliente.edit');
Route::post('cliente', [App\Http\Controllers\App\Cliente\ClienteStoreController::class, 'store'])->name('cliente.store');
Route::put('cliente/{uuid}/update', [App\Http\Controllers\App\Cliente\ClienteUpdateController::class, 'update'])->name('cliente.update');
Route::delete('cliente/{uuid}', [App\Http\Controllers\App\Cliente\ClienteDeleteController::class, 'delete'])->name('cliente.delete');
