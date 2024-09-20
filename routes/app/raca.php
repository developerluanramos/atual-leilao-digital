<?php

Route::get('raca', [\App\Http\Controllers\App\Raca\RacaIndexController::class, 'index'])->name('raca.index');
Route::get('raca/create', [\App\Http\Controllers\App\Raca\RacaCreateController::class, 'create'])->name('raca.create');
