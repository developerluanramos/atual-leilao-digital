<?php

namespace App\Http\Controllers\App\Prelance;

use App\Actions\Prelance\PrelanceCreateAction;
use Illuminate\Http\Request;
use \App\Models\Lance;

class PrelanceCreateController
{
    public function create(Request $request, PrelanceCreateAction $prelanceCreateAction)
    {
        $data = $prelanceCreateAction->exec($request);
        dd($data);
        return view('app.prelance.create', [
            "formData" => $data['formData'],
            "leilao" => $data['leilao']
        ]);
    }
}