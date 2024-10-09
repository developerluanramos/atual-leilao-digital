<?php

namespace App\Observers;

use App\Models\PlanoPagamento;
use Illuminate\Support\Str;

class PlanoPagamentoObserver
{
    public function creating(PlanoPagamento $planoPagamento): void
    {
        $planoPagamento->uuid = Str::uuid();
    }

    /**
     * Handle the PlanoPagamento "created" event.
     */
    public function created(PlanoPagamento $planoPagamento): void
    {
        //
    }

    /**
     * Handle the PlanoPagamento "updated" event.
     */
    public function updated(PlanoPagamento $planoPagamento): void
    {
        //
    }

    /**
     * Handle the PlanoPagamento "deleted" event.
     */
    public function deleted(PlanoPagamento $planoPagamento): void
    {
        //
    }

    /**
     * Handle the PlanoPagamento "restored" event.
     */
    public function restored(PlanoPagamento $planoPagamento): void
    {
        //
    }

    /**
     * Handle the PlanoPagamento "force deleted" event.
     */
    public function forceDeleted(PlanoPagamento $planoPagamento): void
    {
        //
    }
}
