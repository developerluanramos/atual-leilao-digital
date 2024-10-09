<?php

namespace App\Observers;

use App\Models\Lote;
use Illuminate\Support\Str;

class LoteObserver
{
    /**
     * Handle the Lance "created" event.
     */
    public function creating(Lote $lote): void
    {
        $lote->uuid = Str::uuid();
    }
}
