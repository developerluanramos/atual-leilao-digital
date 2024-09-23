<?php

namespace App\Observers;

use App\Models\Raca;
use Illuminate\Support\Str;

class RacaObserver
{
    public function creating(Raca $raca): void
    {
        $raca->uuid = Str::uuid();
    }

    /**
     * Handle the Raca "created" event.
     */
    public function created(Raca $raca): void
    {
        //
    }

    /**
     * Handle the Raca "updated" event.
     */
    public function updated(Raca $raca): void
    {
        //
    }

    /**
     * Handle the Raca "deleted" event.
     */
    public function deleted(Raca $raca): void
    {
        //
    }

    /**
     * Handle the Raca "restored" event.
     */
    public function restored(Raca $raca): void
    {
        //
    }

    /**
     * Handle the Raca "force deleted" event.
     */
    public function forceDeleted(Raca $raca): void
    {
        //
    }
}
