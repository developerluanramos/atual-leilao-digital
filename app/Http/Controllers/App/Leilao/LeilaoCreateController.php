<?php

namespace App\Http\Controllers\App\Leilao;

use App\Actions\Leilao\LeilaoCreateAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeilaoCreateController extends Controller
{
    public function __construct() {}

    public function create(Request $leilaoShowRequest, LeilaoCreateAction $action)
    {
        $formData = $action->execute();

        return view('app.leilao.create', [
            "formData" => $formData
        ]);
    }
}
