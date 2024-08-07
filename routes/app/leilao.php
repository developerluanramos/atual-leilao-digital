<?php
Route::get('leilao/{uuid}/show', [\App\Http\Controllers\App\Leilao\LeilaoShowController::class, 'show'])->name('leilao.show');
Route::get('leilao', [\App\Http\Controllers\App\Leilao\LeilaoIndexController::class, 'index'])->name('leilao.index');
Route::get('leilao/create', [\App\Http\Controllers\App\Leilao\LeilaoCreateController::class, 'create'])->name('leilao.create');
Route::post('leilao/store', [\App\Http\Controllers\App\Leilao\LeilaoCreateController::class, 'store'])->name('leilao.store');
