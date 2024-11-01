<?php

namespace App\DTO\Compra;

use App\Http\Requests\App\Compra\CompraStoreRequest;

class CompraStoreDTO
{
    public function __construct(
        public string $leilao_uuid,
        public string $lote_uuid,
        public string|null $cliente_uuid = null,
        public string $percentual_cota,
        public string $plano_pagamento_uuid,
        public string $valor,
        public string $valor_comissao_vendedor,
        public string $valor_comissao_comprador,
        public array $clientes,
        public array $parcelas
    ) {}

    public static function makeFromRequest(CompraStoreRequest $request): self
    {
        return new self(
            $request->leilao_uuid,
            $request->lote_uuid,
            $request->cliente_uuid ?? null,
            $request->percentual_cota ?? 100,
            $request->plano_pagamento_uuid,
            $request->valor,
            $request->valor_comissao_vendedor,
            $request->valor_comissao_comprador,
            $request->clientes,
            $request->parcelas
        );
    }
}
