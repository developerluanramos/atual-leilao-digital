<?php

namespace App\DTO\Leilao\Lote;

use App\Http\Requests\App\Leilao\Lote\LoteStoreRequest;

class LoteStoreDTO {
    public function __construct(
        public string $descricao,
        public string $leilao_uuid,
        public string $plano_pagamento_uuid,
        public string $valor_estimado,
        public string $valor_minimo_prelance,
        public string $incide_comissao_compra,
        public string $incide_comissao_venda,
        public array $lote_itens,
        public array $lote_vendedores
    ) {}

    public static function makeFromRequest(LoteStoreRequest $request): self
    {
        return new self(
            $request->descricao,
            $request->leilao_uuid,
            $request->plano_pagamento_uuid,
            $request->valor_estimado,
            $request->valor_minimo_prelance,
            $request->incide_comissao_compra ? 1 : 0,
            $request->incide_comissao_venda ? 1 : 0,
            json_decode($request->lote_itens, true),
            json_decode($request->lote_vendedores, true)
        );
    }
}