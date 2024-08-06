<?php
Route::get('leilao/{uuid}/show', [\App\Http\Controllers\App\Leilao\LeilaoShowController::class, 'show'])->name('leilao.show');
Route::get('leilao', [\App\Http\Controllers\App\Leilao\LeilaoIndexController::class, 'index'])->name('leilao.index');
