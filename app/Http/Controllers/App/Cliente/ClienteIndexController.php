<?php
namespace App\Http\Controllers\App\Cliente;

use App\Actions\Cliente\ClienteIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteIndexController extends Controller
{
    public function index(Request $request, ClienteIndexAction $action)
    {
        $clientes = $action->execute(
            $request->get('page', 1),
            $request->get('totalPerPage', 35),
            $request->get('filter', null),
        );

        return view('app.cliente.index', [
            'clientes' => $clientes,
            'filters' => $request->get('filter', null)
        ]);
    }
}