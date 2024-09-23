<?php

namespace App\Observers;

use App\Models\Especie;
use Illuminate\Support\Str;

class EspecieObserver
{
    public function creating(Especie $especie): void
    {
        $especie->uuid = Str::uuid();
    }

    /**
     * Handle the Especie "created" event.
     */
    public function created(Especie $especie): void
    {
        //
    }

    /**
     * Handle the Especie "updated" event.
     */
    public function updated(Especie $especie): void
    {
        //
    }

    /**
     * Handle the Especie "deleted" event.
     */
    public function deleted(Especie $especie): void
    {
        //
    }

    /**
     * Handle the Especie "restored" event.
     */
    public function restored(Especie $especie): void
    {
        //
    }

    /**
     * Handle the Especie "force deleted" event.
     */
    public function forceDeleted(Especie $especie): void
    {
        //
    }
}
