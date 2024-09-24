<?php

namespace App\Http\Controllers\App\Promotor;

use App\Actions\Promotor\PromotorIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Promotor\PromotorIndexRequest;

class PromotorIndexController extends Controller
{
    public function __construct(
        protected PromotorIndexAction $indexAction
    ) { }

    public function index(PromotorIndexRequest $request) 
    {
        $promotores = $this->indexAction->exec(
            page: $request->get('page', 1),
            totalPerPage: $request->get('totalPerPage', 15),
            filter: $request->get('filter', null),
        );

        $filters = ['filter' => $request->get('filter', null)];

        return view('app.promotor.index', compact('promotores', 'filters'));
    }
}