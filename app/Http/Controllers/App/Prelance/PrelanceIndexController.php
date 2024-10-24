<?php

namespace App\Http\Controllers\App\Prelance;

use App\Actions\Prelance\PrelanceIndexAction;
use Illuminate\Http\Request;
use \App\Models\Lance;

class PrelanceIndexController
{
    public function index(Request $request, PrelanceIndexAction $prelanceIndexAction)
    {
        set_time_limit(10000);
        
        $data = $prelanceIndexAction->exec($request->get('leilaoUuid'));
        
        return view('app.prelance.index', [
            "leilao" => $data['leilao']
        ]);
    }
}
