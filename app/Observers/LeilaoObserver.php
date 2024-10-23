<?php

namespace App\Observers;

use App\Models\Leilao;
use Illuminate\Support\Str;

class LeilaoObserver
{
    public function creating(Leilao $leilao): void
    {
        $leilao->uuid = Str::uuid();
    }

    /**
     * Handle the Leilao "created" event.
     */
    public function created(Leilao $leilao): void
    {
        //
    }

    /**
     * Handle the Leilao "updated" event.
     */
    public function updated(Leilao $leilao): void
    {
        //
    }

    /**
     * Handle the Leilao "deleted" event.
     */
    public function deleted(Leilao $leilao): void
    {
        //
    }

    /**
     * Handle the Leilao "restored" event.
     */
    public function restored(Leilao $leilao): void
    {
        //
    }

    /**
     * Handle the Leilao "force deleted" event.
     */
    public function forceDeleted(Leilao $leilao): void
    {
        //
    }
}
