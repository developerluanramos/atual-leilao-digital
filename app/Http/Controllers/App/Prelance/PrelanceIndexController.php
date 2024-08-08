<?php

namespace App\Http\Controllers\App\Prelance;

use App\Actions\Prelance\PrelanceIndexAction;
use Illuminate\Http\Request;

class PrelanceIndexController
{
    public function index(Request $request, PrelanceIndexAction $prelanceIndexAction)
    {
        $leilao = $prelanceIndexAction->exec($request->get('leilaoUuid'));

        return view('app.prelance.index', [
            "leilao" => $leilao
        ]);
    }
}
