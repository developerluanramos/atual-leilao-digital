<?php

Route::get('especie', [\App\Http\Controllers\App\Especie\EspecieIndexController::class, 'index'])->name('especie.index');
Route::get('especie/create', [\App\Http\Controllers\App\Especie\EspecieCreateController::class, 'create'])->name('especie.create');
