<?php

namespace App\Http\Controllers\App\Leilao\Lote;

use App\Actions\Leilao\Lote\LoteUpdateAction;
use App\DTO\Leilao\Lote\LoteUpdateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\Lote\LoteUpdateRequest;
use Illuminate\Support\Facades\Cache;

class LoteUpdateController extends Controller
{
    public function __construct(
        protected LoteUpdateAction $updateAction
    ) { }

    public function update(string $uuid, string $loteUuid, LoteUpdateRequest $request)
    {
        $request->merge([
            'uuid' => $loteUuid,
            'leilao_uuid' => $uuid
        ]);

        $this->updateAction->execute(LoteUpdateDTO::makeFromRequest($request));

        Cache::forget('leilao_lotes_index_'. $uuid);
        Cache::forget('leilao_show_'. $uuid);
        Cache::forget('leilao_lote_show.'.$loteUuid);

        return redirect()->route('leilao.lote.index', [
            'uuid' => $uuid,
            'loteUuid' => $loteUuid
        ]);
    }
}
