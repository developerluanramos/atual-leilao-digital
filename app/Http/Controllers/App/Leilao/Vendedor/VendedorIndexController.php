<?php

namespace App\Http\Controllers\App\Leilao\Vendedor;

use App\Models\Leilao;
use Illuminate\Support\Facades\Request;

class VendedorIndexController
{
    public function index(string $leilaoUuid, Request $request)
    {
        $leilao = Leilao::where('uuid', $leilaoUuid)->first();

        return view('app.leilao.show', [
            'aba' => 'vendedores',
            'action' => 'index',
            'leilao' => $leilao,
            'vendedores' => []
        ]);
    }
}
