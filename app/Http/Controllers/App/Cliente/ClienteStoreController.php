<?php

namespace App\Http\Controllers\App\Cliente;

use App\Actions\Cliente\ClienteStoreAction;
use App\DTO\Cliente\ClienteStoreDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteStoreController extends Controller
{
    public function __construct(
        protected ClienteStoreAction $storeAction
    ) {}

    public function store(Request $request)
    {
        $this->storeAction->exec(ClienteStoreDTO::makeFromRequest($request));

        return redirect()->route('cliente.index');
    }
}