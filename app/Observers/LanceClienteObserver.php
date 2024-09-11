<?php

namespace App\Observers;

use App\Models\LanceCliente;
use Illuminate\Support\Str;

class LanceClienteObserver
{
    /**
     * Handle the Lance "created" event.
     */
    public function creating(LanceCliente $lanceCliente): void
    {
        // $lanceCliente->uuid = Str::uuid();
    }
}
