<?php

Route::get('prelance/index', [\App\Http\Controllers\App\Prelance\PrelanceIndexController::class, 'index'])->name('prelance.index');
Route::get('prelance/create', [\App\Http\Controllers\App\Prelance\PrelanceCreateController::class, 'create'])->name('prelance.create');
