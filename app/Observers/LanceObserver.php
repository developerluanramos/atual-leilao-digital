<?php

namespace App\Observers;

use App\Models\Lance;
use Illuminate\Support\Str;

class LanceObserver
{
    /**
     * Handle the Lance "created" event.
     */
    public function creating(Lance $lance): void
    {
        $lance->uuid = Str::uuid();
    }
}
