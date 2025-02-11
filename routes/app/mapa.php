<?php

Route::get('leilao/{uuid}/mapa/lote-a-lote', [\App\Http\Controllers\App\Mapa\MapaLoteALoteShowController::class, 'show'])->name('leilao.mapa.lote-a-lote');
Route::get('leilao/{uuid}/mapa/ranking-comprador', [\App\Http\Controllers\App\Mapa\MapaRankingCompradorShowController::class, 'show'])->name('leilao.mapa.ranking-comprador');
Route::get('leilao/{uuid}/mapa/ranking-vendedor', [\App\Http\Controllers\App\Mapa\MapaRankingVendedorShowController::class, 'show'])->name('leilao.mapa.ranking-vendedor');
Route::get('leilao/{uuid}/mapa/relacao-comprador', [\App\Http\Controllers\App\Mapa\MapaRelacaoCompradorShowController::class, 'show'])->name('leilao.mapa.relacao-comprador');
Route::get('leilao/{uuid}/mapa/relacao-vendedor', [\App\Http\Controllers\App\Mapa\MapaRelacaoVendedorShowController::class, 'show'])->name('leilao.mapa.relacao-vendedor');
Route::get('leilao/{uuid}/mapa/geral', [\App\Http\Controllers\App\Mapa\MapaGeralShowController::class, 'show'])->name('leilao.mapa.geral');
Route::get('leilao/{uuid}/mapa/media-raca', [\App\Http\Controllers\App\Mapa\MapaMediaRacaShowController::class, 'show'])->name('leilao.mapa.media-raca');
Route::get('leilao/{uuid}/mapa/media-especie', [\App\Http\Controllers\App\Mapa\MapaMediaEspecieShowController::class, 'show'])->name('leilao.mapa.media-especie');


Route::get('leilao/{uuid}/mapa/prelance/resumo-cliente', [\App\Http\Controllers\App\Mapa\Prelance\MapaResumoClienteShowController::class, 'show'])->name('leilao.mapa.prelance.resumo-cliente');
Route::get('leilao/{uuid}/mapa/prelance/resumo-lote', [\App\Http\Controllers\App\Mapa\Prelance\MapaResumoLoteShowController::class, 'show'])->name('leilao.mapa.prelance.resumo-lote');
Route::get('leilao/{uuid}/mapa/prelance/resumo-lote-unico', [\App\Http\Controllers\App\Mapa\Prelance\MapaResumoLoteUnicoShowController::class, 'show'])->name('leilao.mapa.prelance.resumo-lote-unico');
Route::get('leilao/{uuid}/mapa/prelance/vendedor', [\App\Http\Controllers\App\Mapa\Prelance\MapaVendedorShowController::class, 'show'])->name('leilao.mapa.prelance.vendedor');
