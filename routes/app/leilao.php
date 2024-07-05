<?php
Route::get('leilao/{uuid}/show', [\App\Http\Controllers\App\Leilao\LeilaoShowController::class, 'show'])->name('leilao.show');
