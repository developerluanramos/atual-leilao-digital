<?php

namespace App\Observers;

use App\Models\Propriedade;
use Illuminate\Support\Str;

class PropriedadeObserver
{
    public function creating(Propriedade $propriedade): void
    {
        $propriedade->uuid = Str::uuid();
    }

    /**
     * Handle the Propriedade "created" event.
     */
    public function created(Propriedade $propriedade): void
    {
        //
    }

    /**
     * Handle the Propriedade "updated" event.
     */
    public function updated(Propriedade $propriedade): void
    {
        //
    }

    /**
     * Handle the Propriedade "deleted" event.
     */
    public function deleted(Propriedade $propriedade): void
    {
        //
    }

    /**
     * Handle the Propriedade "restored" event.
     */
    public function restored(Propriedade $propriedade): void
    {
        //
    }

    /**
     * Handle the Propriedade "force deleted" event.
     */
    public function forceDeleted(Propriedade $propriedade): void
    {
        //
    }
}
