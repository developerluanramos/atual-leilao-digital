<?php

namespace App\Http\Controllers\App\Leilao\Lote;

use App\Actions\Leilao\Lote\LoteStoreAction;
use App\DTO\Leilao\Lote\LoteStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\Lote\LoteStoreRequest;
use Illuminate\Http\Request;

class LoteStoreController extends Controller
{
    public function store($leilaoUuid, LoteStoreRequest $request)
    {
        $request->merge([
            "leilao_uuid" => $leilaoUuid
        ]);

        $storeLote = (new LoteStoreAction())->execute(
            $leilaoUuid,
            LoteStoreDTO::makeFromRequest($request)
        );

        return redirect()->back();
    }
}
