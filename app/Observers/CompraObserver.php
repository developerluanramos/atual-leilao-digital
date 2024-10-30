<?php

namespace App\Observers;

use App\Models\Compra;
use Illuminate\Support\Str;

class CompraObserver
{
    /**
     * Handle the Cargo "created" event.
     */
    public function creating(Compra $compra): void
    {
        $compra->uuid = Str::uuid();
    }
}
