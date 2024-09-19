<?php

Route::get('especie', [\App\Http\Controllers\App\Especie\EspecieIndexController::class, 'index'])->name('especie.index');
