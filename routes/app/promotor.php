<?php

Route::get('promotor', [\App\Http\Controllers\App\Promotor\PromotorIndexController::class, 'index'])->name('promotor.index');
Route::get('promotor/create', [\App\Http\Controllers\App\Promotor\PromotorCreateController::class, 'create'])->name('promotor.create');
Route::post('promotor', [\App\Http\Controllers\App\Promotor\PromotorStoreController::class, 'store'])->name('promotor.store');
Route::get('promotor/{uuid}/edit', [\App\Http\Controllers\App\Promotor\PromotorEditController::class, 'edit'])->name('promotor.edit');
Route::put('promotor/{uuid}/update', [\App\Http\Controllers\App\Promotor\PromotorUpdateController::class, 'update'])->name('promotor.update');
