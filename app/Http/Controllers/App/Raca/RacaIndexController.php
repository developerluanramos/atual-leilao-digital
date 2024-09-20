<?php

namespace App\Http\Controllers\App\Raca;

use App\Actions\Raca\RacaIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Raca\RacaIndexRequest;

class RacaIndexController extends Controller
{
    public function __construct(
        protected RacaIndexAction $indexAction
    ) { }

    public function index(RacaIndexRequest $request)
    {
        $racas = $this->indexAction->exec(
            page: $request->get('page', 1),
            totalPerPage: $request->get('totalPerPage', 15),
            filter: $request->get('filter', null),
        );

        $filters = ['filter' => $request->get('filter', null)];

        return view('app.raca.index', compact('racas', 'filters'));
    }
}