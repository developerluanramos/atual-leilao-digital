<?php

Route::get('plano-pagamento/create', [App\Http\Controllers\App\PlanoPagamento\PlanoPagamentoCreateController::class, 'create'])->name('plano-pagamento.create');
Route::get('plano-pagamento', [App\Http\Controllers\App\PlanoPagamento\PlanoPagamentoIndexController::class, 'index'])->name('plano-pagamento.index');
Route::post('plano-pagamento', [App\Http\Controllers\App\PlanoPagamento\PlanoPagamentoStoreController::class, 'store'])->name('plano-pagamento.store');
Route::get('plano-pagamento/{uuid}/edit', [App\Http\Controllers\App\PlanoPagamento\PlanoPagamentoEditController::class, 'edit'])->name('plano-pagamento.edit');
Route::put('plano-pagamento/{uuid}/update', [App\Http\Controllers\App\PlanoPagamento\PlanoPagamentoUpdateController::class, 'update'])->name('plano-pagamento.update');
Route::delete('plano-pagamento/{uuid}', [App\Http\Controllers\App\PlanoPagamento\PlanoPagamentoDeleteController::class, 'delete'])->name('plano-pagamento.delete');