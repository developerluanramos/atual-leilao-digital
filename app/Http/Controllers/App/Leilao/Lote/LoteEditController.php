<?php

namespace App\Http\Controllers\App\Leilao\Lote;

use App\Actions\Leilao\Lote\LoteCreateAction;
use App\Actions\Leilao\Lote\LoteEditAction;
use App\DTO\Leilao\Lote\LoteEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\Lote\LoteEditRequest;

class LoteEditController extends Controller
{
    public function __construct(
        protected LoteEditAction $editAction,
        protected LoteCreateAction $createAction
    ) {}

    public function edit(string $uuid, string $loteUuid, LoteEditRequest $request)
    {
        $request->merge([
            'uuid' => $loteUuid
        ]);

        $formData = $this->createAction->execute($uuid);
        $lote = $this->editAction->exec(LoteEditDTO::makeFromRequest($request));

        foreach($lote->itens as $item)
        {
            $itens[] = [
                'descricao' => $item->descricao,
                'genero' => $item->genero,
                'lote_uuid' => $item->lote_uuid,
                'raca_uuid' => $item->raca_uuid,
                'especie_uuid' => $item->especie_uuid,
                'valor_estimado' => $item->valor_estimado,
                'imagens' => [],
                'videos' => []
            ];
        }
        
        return view('app.leilao.lotes.edit', [
            'uuid' => $uuid, 
            'loteUuid' => $loteUuid,
            'formData' => $formData,
            'lote' => $lote,
            'itens' => $itens
        ]);
    }
}