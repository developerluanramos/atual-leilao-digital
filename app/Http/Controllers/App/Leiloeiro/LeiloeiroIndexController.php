<?php

namespace App\Http\Controllers\App\Leiloeiro;

use App\Actions\Leiloeiro\LeiloeiroIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leiloeiro\LeiloeiroIndexRequest;

class LeiloeiroIndexController extends Controller 
{
    public function __construct(
        protected LeiloeiroIndexAction $indexAction
    ) { }

    public function index(LeiloeiroIndexRequest $leiloeiroIndexRequest)
    {
        $leiloeiros = $this->indexAction->exec(
            page: $leiloeiroIndexRequest->get('page', 1),
            totalPerPage: $leiloeiroIndexRequest->get('totalPerPage', 15),
            filter: $leiloeiroIndexRequest->get('filter', null),
        );

        $filters = ['filter' => $leiloeiroIndexRequest->get('filter', null)];

        return view('app.leiloeiro.index',compact('leiloeiros', 'filters'));
    } 
}