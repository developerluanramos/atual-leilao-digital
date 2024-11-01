<?php

namespace App\Observers;

use App\Models\Parcela;
use Illuminate\Support\Str;

class ParcelaObserver
{
    /**
     * Handle the Parcela "created" event.
     */
    public function creating(Parcela $parcela): void
    {
        $parcela->uuid = Str::uuid();
    }

    /**
     * Handle the Parcela "updated" event.
     */
    public function updated(Parcela $parcela): void
    {
        //
    }

    /**
     * Handle the Parcela "deleted" event.
     */
    public function deleted(Parcela $parcela): void
    {
        //
    }

    /**
     * Handle the Parcela "restored" event.
     */
    public function restored(Parcela $parcela): void
    {
        //
    }

    /**
     * Handle the Parcela "force deleted" event.
     */
    public function forceDeleted(Parcela $parcela): void
    {
        //
    }
}
