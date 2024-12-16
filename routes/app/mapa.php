<?php

Route::get('leilao/{uuid}/mapa/lote-a-lote', [\App\Http\Controllers\App\Mapa\MapaLoteALoteShowController::class, 'mapa'])->name('leilao.mapa.lote-a-lote');
