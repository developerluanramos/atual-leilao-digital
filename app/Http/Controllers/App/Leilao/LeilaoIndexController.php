<?php

namespace App\Http\Controllers\App\Leilao;

use App\Actions\Leilao\LeilaoIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LeilaoIndexController extends Controller
{
    public function __construct() {}

    public function index(Request $leilaoIndexRequest, LeilaoIndexAction $action)
    {
        $leiloes = Cache::rememberForever('leiloes', function () use ($leilaoIndexRequest, $action) {
            return $action->exec(
                $leilaoIndexRequest->get('page') ?? 1,
                $leilaoIndexRequest->get('totalPerPage') ?? 20,
                []
            );
        });


        return view('app.leilao.index', [
            'leiloes' => $leiloes
        ]);
    }
}
