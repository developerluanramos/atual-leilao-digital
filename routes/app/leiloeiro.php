<?php

Route::get('/leiloeiro', [App\Http\Controllers\App\Leiloeiro\LeiloeiroIndexController::class, 'index'])->name('leiloeiro.index');
