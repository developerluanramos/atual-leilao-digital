<?php

namespace App\Observers;

use App\Models\LoteItemVideo;
use Illuminate\Support\Str;

class LoteItemVideoObserver
{

    /**
     * Handle the LoteItemImagem "created" event.
     */
    public function creating(LoteItemVideo $loteItemVideo): void
    {
        $loteItemVideo->uuid = Str::uuid();
    }

    /**
     * Handle the LoteItemVideo "created" event.
     */
    public function created(LoteItemVideo $loteItemVideo): void
    {
        //
    }

    /**
     * Handle the LoteItemVideo "updated" event.
     */
    public function updated(LoteItemVideo $loteItemVideo): void
    {
        //
    }

    /**
     * Handle the LoteItemVideo "deleted" event.
     */
    public function deleted(LoteItemVideo $loteItemVideo): void
    {
        //
    }

    /**
     * Handle the LoteItemVideo "restored" event.
     */
    public function restored(LoteItemVideo $loteItemVideo): void
    {
        //
    }

    /**
     * Handle the LoteItemVideo "force deleted" event.
     */
    public function forceDeleted(LoteItemVideo $loteItemVideo): void
    {
        //
    }
}
