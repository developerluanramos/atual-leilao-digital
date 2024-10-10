<?php

namespace App\Observers;

use App\Models\LoteItemImagem;
use Illuminate\Support\Str;

class LoteItemImagemObserver
{
    /**
     * Handle the LoteItemImagem "created" event.
     */
    public function creating(LoteItemImagem $loteItemImagem): void
    {
        $loteItemImagem->uuid = Str::uuid();
    }

    /**
     * Handle the LoteItemImagem "created" event.
     */
    public function created(LoteItemImagem $loteItemImagem): void
    {
        //
    }

    /**
     * Handle the LoteItemImagem "updated" event.
     */
    public function updated(LoteItemImagem $loteItemImagem): void
    {
        //
    }

    /**
     * Handle the LoteItemImagem "deleted" event.
     */
    public function deleted(LoteItemImagem $loteItemImagem): void
    {
        //
    }

    /**
     * Handle the LoteItemImagem "restored" event.
     */
    public function restored(LoteItemImagem $loteItemImagem): void
    {
        //
    }

    /**
     * Handle the LoteItemImagem "force deleted" event.
     */
    public function forceDeleted(LoteItemImagem $loteItemImagem): void
    {
        //
    }
}
