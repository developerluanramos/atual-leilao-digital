<?php

Route::get('promotor', [\App\Http\Controllers\App\Promotor\PromotorIndexController::class, 'index'])->name('promotor.index');
