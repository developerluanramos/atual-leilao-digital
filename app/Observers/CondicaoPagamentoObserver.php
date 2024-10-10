<?php

namespace App\Observers;

use App\Models\CondicaoPagamento;
use Illuminate\Support\Str;

class CondicaoPagamentoObserver
{
    public function creating(CondicaoPagamento $condicaoPagamento): void
    {
        $condicaoPagamento->uuid = Str::uuid();
    }

    /**
     * Handle the CondicaoPagamento "created" event.
     */
    public function created(CondicaoPagamento $condicaoPagamento): void
    {
        //
    }

    /**
     * Handle the CondicaoPagamento "updated" event.
     */
    public function updated(CondicaoPagamento $condicaoPagamento): void
    {
        //
    }

    /**
     * Handle the CondicaoPagamento "deleted" event.
     */
    public function deleted(CondicaoPagamento $condicaoPagamento): void
    {
        //
    }

    /**
     * Handle the CondicaoPagamento "restored" event.
     */
    public function restored(CondicaoPagamento $condicaoPagamento): void
    {
        //
    }

    /**
     * Handle the CondicaoPagamento "force deleted" event.
     */
    public function forceDeleted(CondicaoPagamento $condicaoPagamento): void
    {
        //
    }
}
