<?php

Route::get('plano-pagamento/create', [App\Http\Controllers\App\PlanoPagamento\PlanoPagamentoCreateController::class, 'create'])->name('plano-pagamento.create');
Route::get('plano-pagamento', [App\Http\Controllers\App\PlanoPagamento\PlanoPagamentoIndexController::class, 'index'])->name('plano-pagamento.index');