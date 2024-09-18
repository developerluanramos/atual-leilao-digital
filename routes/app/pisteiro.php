<?php

Route::get('pisteiro', [\App\Http\Controllers\App\Pisteiro\PisteiroIndexController::class, 'index'])->name('pisteiro.index');
