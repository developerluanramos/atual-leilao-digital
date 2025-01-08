<?php

Route::get('leilao/{uuid}/mapa/lote-a-lote', [\App\Http\Controllers\App\Mapa\MapaLoteALoteShowController::class, 'show'])->name('leilao.mapa.lote-a-lote');
Route::get('leilao/{uuid}/mapa/ranking-comprador', [\App\Http\Controllers\App\Mapa\MapaRankingCompradorShowController::class, 'show'])->name('leilao.mapa.ranking-comprador');
Route::get('leilao/{uuid}/mapa/ranking-vendedor', [\App\Http\Controllers\App\Mapa\MapaRankingVendedorShowController::class, 'show'])->name('leilao.mapa.ranking-vendedor');
// Route::get('leilao/{uuid}/mapa/dados-comprador', [\App\Http\Controllers\App\Mapa\MapaRankingVendedorShowController::class, 'show'])->name('leilao.mapa.dados-comprador');
// Route::get('leilao/{uuid}/mapa/dados-vendedor', [\App\Http\Controllers\App\Mapa\MapaRankingVendedorShowController::class, 'show'])->name('leilao.mapa.dados-vendedor');