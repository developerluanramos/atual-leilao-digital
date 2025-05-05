<?php

namespace App\Http\Controllers\App\Leilao;

use App\Actions\Leilao\LeilaoCreateAction;
use App\Http\Controllers\Controller;
use App\Models\Leilao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LeilaoCreateController extends Controller
{
    public function __construct() {}

    public function create(Request $leilaoShowRequest, LeilaoCreateAction $action)
    {
        $formData = $action->execute();

        Cache::forget('leiloes');

        return view('app.leilao.create', [
            "formData" => $formData,
            "leilao" => new Leilao()
        ]);
    }
}
