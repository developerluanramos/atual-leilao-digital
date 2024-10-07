<?php

namespace App\Http\Controllers\App\Leilao;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\LeilaoStoreRequest;

class LeilaoStoreController extends Controller
{
    public function __construct()
    {
        
    }

    public function store(LeilaoStoreRequest $request)
    {
        dd($request->all());
    }
}