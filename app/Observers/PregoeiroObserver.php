<?php

namespace App\Observers;

use App\Models\Pregoeiro;
use Illuminate\Support\Str;

class PregoeiroObserver
{
    public function creating(Pregoeiro $pregoeiro): void
    {
        $pregoeiro->uuid = Str::uuid();
    }

    /**
     * Handle the Pregoeiro "created" event.
     */
    public function created(Pregoeiro $pregoeiro): void
    {
        //
    }

    /**
     * Handle the Pregoeiro "updated" event.
     */
    public function updated(Pregoeiro $pregoeiro): void
    {
        //
    }

    /**
     * Handle the Pregoeiro "deleted" event.
     */
    public function deleted(Pregoeiro $pregoeiro): void
    {
        //
    }

    /**
     * Handle the Pregoeiro "restored" event.
     */
    public function restored(Pregoeiro $pregoeiro): void
    {
        //
    }

    /**
     * Handle the Pregoeiro "force deleted" event.
     */
    public function forceDeleted(Pregoeiro $pregoeiro): void
    {
        //
    }
}
