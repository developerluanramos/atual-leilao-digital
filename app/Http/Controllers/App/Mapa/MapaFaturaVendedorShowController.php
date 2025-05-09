<?php

namespace App\Http\Controllers\App\Mapa;

use App\Http\Traits\App\GeneratePdfTrait;
use Illuminate\Http\Request;

class MapaFaturaVendedorShowController
{
    use GeneratePdfTrait;

    public function __construct() {}

    public function show(string $leilaoUuid, Request $request)
    {
        return view('app.mapa.fatura-vendedor', compact('leilaoUuid'));
    }
}
