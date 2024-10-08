<?php

namespace App\http\Controllers\App\Leilao;

use App\Actions\Leilao\LeilaoCreateAction;
use App\Actions\Leilao\LeilaoEditAction;
use App\DTO\Leilao\LeilaoEditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Leilao\LeilaoEditRequest;
use Carbon\Carbon;

class LeilaoEditController extends Controller
{
    public function __construct(
        protected LeilaoEditAction $editAction,
        protected LeilaoCreateAction $createAction
    ) { }

    public function edit(string $uuid, LeilaoEditRequest $request)
    {
        $request->merge([
            'uuid' => $uuid
        ]);

        $formData = $this->createAction->execute();
        $leilao = $this->editAction->exec(LeilaoEditDTO::makeFromRequest($request));

        $leilao->aberto_em = Carbon::parse($leilao->aberto_em)->format('m-d-Y');
        $leilao->fechado_em = Carbon::parse($leilao->fechado_em)->format('m-d-Y');
        $leilao->prelance_aberto_em = Carbon::parse($leilao->prelance_aberto_em)->format('m-d-Y');
        $leilao->prelance_fechado_em = Carbon::parse($leilao->prelance_fechado_em)->format('m-d-Y');
        
        // dd($leilao);

        return view('app.leilao.edit', compact('leilao', 'formData'));
    }
}