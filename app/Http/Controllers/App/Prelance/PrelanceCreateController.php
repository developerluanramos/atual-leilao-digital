<?php

namespace App\Http\Controllers\App\Prelance;

use App\Actions\Prelance\PrelanceCreateAction;
use Illuminate\Http\Request;
use \App\Models\Lance;

class PrelanceCreateController
{
    public function create(Request $request, PrelanceCreateAction $prelanceCreateAction)
    {
        $formData = $prelanceCreateAction->exec($request);

        return view('app.prelance.create', $formData);
    }
}