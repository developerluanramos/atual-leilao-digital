<?php

Route::get('leilao/{uuid}/mapa/lote-a-lote', [\App\Http\Controllers\App\Mapa\MapaLoteALoteShowController::class, 'show'])->name('leilao.mapa.lote-a-lote');
Route::get('leilao/{uuid}/mapa/ranking-comprador', [\App\Http\Controllers\App\Mapa\MapaRankingCompradorShowController::class, 'show'])->name('leilao.mapa.ranking-comprador');
Route::get('leilao/{uuid}/mapa/ranking-vendedor', [\App\Http\Controllers\App\Mapa\MapaRankingVendedorShowController::class, 'show'])->name('leilao.mapa.ranking-vendedor');
// Route::get('leilao/{uuid}/mapa/relacao-comprador', [\App\Http\Controllers\App\Mapa\MapaRankingVendedorShowController::class, 'show'])->name('leilao.mapa.relacao-comprador');
// Route::get('leilao/{uuid}/mapa/relacao-vendedor', [\App\Http\Controllers\App\Mapa\MapaRankingVendedorShowController::class, 'show'])->name('leilao.mapa.relacao-vendedor');
Route::get('leilao/{uuid}/mapa/media-raca', [\App\Http\Controllers\App\Mapa\MapaMediaRacaShowController::class, 'show'])->name('leilao.mapa.media-raca');
Route::get('leilao/{uuid}/mapa/media-especie', [\App\Http\Controllers\App\Mapa\MapaMediaEspecieShowController::class, 'show'])->name('leilao.mapa.media-especie');