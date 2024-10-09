<?php

Route::get('cliente', [App\Http\Controllers\App\Cliente\ClienteIndexController::class, 'index'])->name('cliente.index');