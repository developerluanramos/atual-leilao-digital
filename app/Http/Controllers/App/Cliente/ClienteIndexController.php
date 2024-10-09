<?php

namespace App\Http\Controllers\App\Cliente;

use App\Actions\Cliente\ClienteIndexAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Cliente\ClienteIndexRequest;

class ClienteIndexController extends Controller
{
    public function __construct(
        protected ClienteIndexAction $indexAction
    ) { }

    public function index(ClienteIndexRequest $request)
    {
        $clientes = $this->indexAction->exec(
            page: $request->get('page', 1),
            totalPerPage: $request->get('totalPerPage', 15),
            filter: $request->get('filter', null),
        );

        $filters = ['filter' => $request->get('filter', null)];

        return view('app.cliente.index', compact('clientes', 'filters'));
    }
}