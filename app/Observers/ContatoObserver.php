<?php

namespace App\Observers;

use App\Models\Contato;
use Illuminate\Support\Str;

class ContatoObserver
{
    public function creating(Contato $contato): void
    {
        $contato->uuid = Str::uuid();
    }

    /**
     * Handle the Contato "created" event.
     */
    public function created(Contato $contato): void
    {
        //
    }

    /**
     * Handle the Contato "updated" event.
     */
    public function updated(Contato $contato): void
    {
        //
    }

    /**
     * Handle the Contato "deleted" event.
     */
    public function deleted(Contato $contato): void
    {
        //
    }

    /**
     * Handle the Contato "restored" event.
     */
    public function restored(Contato $contato): void
    {
        //
    }

    /**
     * Handle the Contato "force deleted" event.
     */
    public function forceDeleted(Contato $contato): void
    {
        //
    }
}
