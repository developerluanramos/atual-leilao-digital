<?php

Route::get('promotor', [\App\Http\Controllers\App\Promotor\PromotorIndexController::class, 'index'])->name('promotor.index');
Route::get('promotor/create', [\App\Http\Controllers\App\Promotor\PromotorCreateController::class, 'create'])->name('promotor.create');
Route::post('promotor', [\App\Http\Controllers\App\Promotor\PromotorStoreController::class, 'store'])->name('promotor.store');