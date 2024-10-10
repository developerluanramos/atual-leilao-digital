<?php

namespace App\Http\Controllers\App\Leilao\Lote;

use App\Actions\Leilao\Lote\LoteStoreAction;
use App\DTO\Leilao\Lote\LoteStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\Lote\LoteStoreRequest;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class LoteStoreController extends Controller
{
    use WithFileUploads;

    public function store($leilaoUuid, LoteStoreRequest $request)
    {
        $request->merge([
            "leilao_uuid" => $leilaoUuid
        ]);

        $storeLote = (new LoteStoreAction())->execute(
            LoteStoreDTO::makeFromRequest($request)
        );

        return redirect()->back();
    }
}
