<?php

namespace App\Http\Controllers\App\Pisteiro;

use App\Actions\Pisteiro\PisteiroIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Pisteiro\PisteiroIndexRequest;

class PisteiroIndexController extends Controller
{
    public function __construct(
        protected PisteiroIndexAction $indexAction
    ) { }

    public function index(PisteiroIndexRequest $pisteiroIndexRequest)
    {
        $pisteiros = $this->indexAction->exec(
            page: $pisteiroIndexRequest->get('page', 1),
            totalPerPage: $pisteiroIndexRequest->get('totalPerPage', 15),
            filter: $pisteiroIndexRequest->get('filter', null),
        );

        $filters = ['filter' => $pisteiroIndexRequest->get('filter', null)];

        return view('app.pisteiro.index', compact('pisteiros', 'filters'));
    }
}