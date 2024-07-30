<?php
Route::get('leilao/{uuid}/lote/index', [\App\Http\Controllers\App\Leilao\Lote\LoteIndexController::class, 'index'])->name('leilao.lote.index');
Route::get('leilao/{uuid}/lote/create', [\App\Http\Controllers\App\Leilao\Lote\LoteCreateController::class, 'create'])->name('leilao.lote.create');
Route::get('leilao/{uuid}/lote/{loteUuid}/edit', [\App\Http\Controllers\App\Leilao\Lote\LoteEditController::class, 'edit'])->name('leilao.lote.edit');
Route::get('leilao/{uuid}/lote/{loteUuid}/update', [\App\Http\Controllers\App\Leilao\Lote\LoteUpdateController::class, 'update'])->name('leilao.lote.update');
Route::get('leilao/{uuid}/lote/{loteUuid}/show', [\App\Http\Controllers\App\Leilao\Lote\LoteShowController::class, 'show'])->name('leilao.lote.show');
