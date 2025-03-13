<?php

namespace App\DTO\Prelance;

use App\DTO\BaseDTO;
use App\Http\Requests\App\Prelance\PrelanceStoreRequest;

class PrelanceStoreDTO extends BaseDTO
{
    public function __construct(
        public string $leilao_uuid,
        public string $lote_uuid,
        public string $prelance_config_uuid,
        public string $plano_pagamento_uuid,
        public string $realizado_em,
        public string $valor,
        public string|null $valor_comissao_compra = null,
        public string|null $valor_comissao_venda = null,
        public array $clientes,
        public array $lotesExtras
    ) { }

    public static function makeFromRequest(PrelanceStoreRequest $request)
    {
        return new self(
            $request->leilao_uuid,
            $request->lote_uuid,
            $request->prelance_config_uuid,
            $request->plano_pagamento_uuid,
            $request->realizado_em,
            $request->valor,
            $request->valor_comissao_compra,
            $request->valor_comissao_venda,
            $request->clientes,
            $request->lotesExtras
        );
    }
}