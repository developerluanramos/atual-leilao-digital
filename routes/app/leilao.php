<?php
Route::get('leilao/{uuid}/show', [\App\Http\Controllers\App\Leilao\LeilaoShowController::class, 'show'])->name('leilao.show');
Route::get('leilao', [\App\Http\Controllers\App\Leilao\LeilaoIndexController::class, 'index'])->name('leilao.index');
Route::get('leilao/create', [\App\Http\Controllers\App\Leilao\LeilaoCreateController::class, 'create'])->name('leilao.create');
Route::post('leilao/store', [\App\Http\Controllers\App\Leilao\LeilaoStoreController::class, 'store'])->name('leilao.store');
Route::get('leilao/{uuid}/edit', [\App\Http\Controllers\App\Leilao\LeilaoEditController::class, 'edit'])->name('leilao.edit');
Route::delete('leilao/{uuid}', [\App\Http\Controllers\App\Leilao\LeilaoDeleteController::class, 'delete'])->name('leilao.delete');
Route::put('leilao/{uuid}/update', [\App\Http\Controllers\App\Leilao\LeilaoUpdateController::class, 'update'])->name('leilao.update');


Route::get('leilao/{uuid}/vendedores', [\App\Http\Controllers\App\Leilao\Vendedor\VendedorIndexController::class, 'index'])->name('leilao.vendedor.index');
Route::get('leilao/{uuid}/compradores', [\App\Http\Controllers\App\Leilao\Comprador\CompradorIndexController::class, 'index'])->name('leilao.comprador.index');
