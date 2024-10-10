<?php

namespace App\DTO\Leilao\Lote;

use App\Http\Requests\App\Leilao\Lote\LoteEditRequest;

class LoteEditDTO
{
    public function __construct(
        public string $uuid
    ) { }

    public static function makeFromRequest(LoteEditRequest $request): self
    {
        return new self(
            $request->uuid
        );
    }

    // public static function makeFromAction(Leilao $leilao)
    // {
    //     $leilao->aberto_em = Carbon::parse($leilao->aberto_em)->toDateString();
    //     $leilao->fechado_em = Carbon::parse($leilao->fechado_em)->toDateString();
    //     $leilao->prelance_aberto_em = Carbon::parse($leilao->prelance_aberto_em)->toDateString();
    //     $leilao->prelance_fechado_em = Carbon::parse($leilao->prelance_fechado_em)->toDateString();
        
    //     return $leilao;
    // }
}