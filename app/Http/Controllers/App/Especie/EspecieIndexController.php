<?php

namespace App\Http\Controllers\App\Especie;

use App\Actions\Especie\EspecieIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Especie\EspecieIndexRequest;

class EspecieIndexController extends Controller
{
    public function __construct(
        protected EspecieIndexAction $indexAction
    ) { }

    public function index(EspecieIndexRequest $request)
    {
        $especies = $this->indexAction->exec(
            page: $request->get('page', 1),
            totalPerPage: $request->get('totalPerPage', 15),
            filter: $request->get('filter', null),
        );

        $filters = ['filter' => $request->get('filter', null)];

        return view('app.especie.index', compact('especies', 'filters'));
    }
}