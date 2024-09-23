<?php

namespace App\Http\Controllers\App\Leiloeiro;

use App\Actions\Leiloeiro\LeiloeiroDeleteAction;
use App\DTO\Leiloeiro\LeiloeiroDeleteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leiloeiro\LeiloeiroDeleteRequest;

class LeiloeiroDeleteController extends Controller
{
    public function __construct(
        protected LeiloeiroDeleteAction $deleteAction
    ) { }

    public function delete(LeiloeiroDeleteRequest $deleteRequest)
    {
        $this->deleteAction->exec(LeiloeiroDeleteDTO::makeFromRequest($deleteRequest));

        return redirect()->back();
    }
}