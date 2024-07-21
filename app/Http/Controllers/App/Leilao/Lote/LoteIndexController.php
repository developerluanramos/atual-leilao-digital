<?php

namespace App\Http\Controllers\App\Leilao\Lote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoteIndexController extends Controller
{
    public function index(Request $request)
    {
        return view('app.leilao.show', ['aba' => 'lote', 'data' => []]);
    }
}
