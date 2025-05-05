<?php

namespace App\Http\Controllers\App\Leilao\Lote;

use App\Actions\Leilao\Lote\LoteStoreAction;
use App\DTO\Leilao\Lote\LoteStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\Lote\LoteStoreRequest;
use App\Models\Lote;
use Illuminate\Support\Facades\Cache;
use Livewire\WithFileUploads;

class LoteStoreController extends Controller
{
    use WithFileUploads;

    public function store($leilaoUuid, LoteStoreRequest $request)
    {
        $request->merge([
            "leilao_uuid" => $leilaoUuid
        ]);

        $storeLote = (new LoteStoreAction(new Lote()))->execute(
            LoteStoreDTO::makeFromRequest($request)
        );

        Cache::forget('leilao_lotes_index_'. $leilaoUuid);
        Cache::forget('leilao_show_'. $leilaoUuid);

        return redirect()->route('leilao.lote.index', [$leilaoUuid]);
    }
}
