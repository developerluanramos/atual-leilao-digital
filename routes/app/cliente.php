<?php

Route::get('cliente', [App\Http\Controllers\App\Cliente\ClienteIndexController::class, 'index'])->name('cliente.index');
Route::get('cliente/create', [App\Http\Controllers\App\Cliente\ClienteCreateController::class, 'create'])->name('cliente.create');
Route::get('cliente/{uuid}/edit', [App\Http\Controllers\App\Cliente\ClienteEditController::class, 'edit'])->name('cliente.edit');