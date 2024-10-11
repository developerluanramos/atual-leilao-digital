<?php

namespace App\Http\Controllers\App\Leilao\Lote;

use App\Actions\Leilao\Lote\LoteDeleteAction;
use App\DTO\Leilao\Lote\LoteDeleteDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\Lote\LoteDeleteRequest;

class LoteDeleteController extends Controller
{
    public function __construct(
        protected LoteDeleteAction $deleteAction
    ) {}

    public function delete(string $uuid, string $loteUuid, LoteDeleteRequest $request)
    {
        $request->merge([
            'uuid' => $loteUuid
        ]);

        $this->deleteAction->exec(LoteDeleteDTO::makeFromRequest($request));

        return redirect()->back();
    }
}