<?php

Route::get('pisteiro', [\App\Http\Controllers\App\Pisteiro\PisteiroIndexController::class, 'index'])->name('pisteiro.index');
Route::get('pisteiro/create', [\App\Http\Controllers\App\Pisteiro\PisteiroCreateController::class, 'create'])->name('pisteiro.create');
