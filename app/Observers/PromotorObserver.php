<?php

namespace App\Observers;

use App\Models\Promotor;
use Illuminate\Support\Str;

class PromotorObserver
{
    public function creating(Promotor $promotor): void
    {
        $promotor->uuid = Str::uuid();
    }

    /**
     * Handle the Promotor "created" event.
     */
    public function created(Promotor $promotor): void
    {
        //
    }

    /**
     * Handle the Promotor "updated" event.
     */
    public function updated(Promotor $promotor): void
    {
        //
    }

    /**
     * Handle the Promotor "deleted" event.
     */
    public function deleted(Promotor $promotor): void
    {
        //
    }

    /**
     * Handle the Promotor "restored" event.
     */
    public function restored(Promotor $promotor): void
    {
        //
    }

    /**
     * Handle the Promotor "force deleted" event.
     */
    public function forceDeleted(Promotor $promotor): void
    {
        //
    }
}
