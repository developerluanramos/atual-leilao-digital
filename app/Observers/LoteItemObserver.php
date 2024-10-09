<?php

namespace App\Observers;

use App\Models\LoteItem;
use Illuminate\Support\Str;

class LoteItemObserver
{
    /**
     * Handle the Lance "created" event.
     */
    public function creating(LoteItem $lote): void
    {
        $lote->uuid = Str::uuid();
    }
}
