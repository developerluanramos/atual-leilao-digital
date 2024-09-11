<?php

namespace App\Http\Controllers\App\Prelance;

use App\Actions\Prelance\PrelanceStoreAction;
use App\DTO\Prelance\PrelanceStoreDTO;
use App\Http\Requests\App\Prelance\PrelanceStoreRequest;

class PrelanceStoreController
{
    public function store(PrelanceStoreRequest $request, PrelanceStoreAction $prelanceStoreAction)
    {
        $prelanceStoreAction->exec(PrelanceStoreDTO::makeFromRequest($request));

        return redirect()->back();
    }
}