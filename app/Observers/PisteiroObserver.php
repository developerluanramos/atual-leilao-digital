<?php

namespace App\Observers;

use App\Models\Pisteiro;
use Illuminate\Support\Str;

class PisteiroObserver
{
    public function creating(Pisteiro $pisteiro): void
    {
        $pisteiro->uuid = Str::uuid();
    }

    /**
     * Handle the Pisteiro "created" event.
     */
    public function created(Pisteiro $pisteiro): void
    {
        //
    }

    /**
     * Handle the Pisteiro "updated" event.
     */
    public function updated(Pisteiro $pisteiro): void
    {
        //
    }

    /**
     * Handle the Pisteiro "deleted" event.
     */
    public function deleted(Pisteiro $pisteiro): void
    {
        //
    }

    /**
     * Handle the Pisteiro "restored" event.
     */
    public function restored(Pisteiro $pisteiro): void
    {
        //
    }

    /**
     * Handle the Pisteiro "force deleted" event.
     */
    public function forceDeleted(Pisteiro $pisteiro): void
    {
        //
    }
}
