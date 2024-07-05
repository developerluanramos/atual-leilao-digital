<?php

namespace App\Http\Controllers\App\Leilao;

use App\Actions\Setor\SetorCreateAction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class LeilaoShowController extends Controller
{
    public function __construct() {}

    public function show(Request $leilaoShowRequest)
    {
        return view('app.leilao.show');
    }
}
