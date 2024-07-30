<?php

namespace App\Http\Controllers\App\Leilao\Lote;

use App\Actions\Leilao\Lote\LoteCreateAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoteStoreController extends Controller
{
    public function store($leilaoUuid, Request $request)
    {
        dd($request->all());
    }
}
