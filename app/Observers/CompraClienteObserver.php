<?php

namespace App\Observers;

use App\Models\CompraCliente;
use Illuminate\Support\Str;

class CompraClienteObserver
{
    /**
     * Handle the Cargo "created" event.
     */
    public function creating(CompraCliente $compraCliente): void
    {
        $compraCliente->uuid = Str::uuid();
    }
}
