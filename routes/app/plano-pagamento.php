<?php

Route::get('plano-pagamento/create', [App\Http\Controllers\App\PlanoPagamento\PlanoPagamentoCreateController::class, 'create'])->name('plano-pagamento.create');