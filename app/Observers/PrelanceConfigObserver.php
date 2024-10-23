<?php

namespace App\Observers;

use App\Models\PrelanceConfig;
use Illuminate\Support\Str;

class PrelanceConfigObserver
{
    public function creating(PrelanceConfig $prelanceConfig): void
    {
        $prelanceConfig->uuid = Str::uuid();
    }
    /**
     * Handle the PrelanceConfig "created" event.
     */
    public function created(PrelanceConfig $prelanceConfig): void
    {
        //
    }

    /**
     * Handle the PrelanceConfig "updated" event.
     */
    public function updated(PrelanceConfig $prelanceConfig): void
    {
        //
    }

    /**
     * Handle the PrelanceConfig "deleted" event.
     */
    public function deleted(PrelanceConfig $prelanceConfig): void
    {
        //
    }

    /**
     * Handle the PrelanceConfig "restored" event.
     */
    public function restored(PrelanceConfig $prelanceConfig): void
    {
        //
    }

    /**
     * Handle the PrelanceConfig "force deleted" event.
     */
    public function forceDeleted(PrelanceConfig $prelanceConfig): void
    {
        //
    }
}
