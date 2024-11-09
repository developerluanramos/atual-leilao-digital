<?php

namespace App\Actions\Leilao\Lote;

use App\Models\Leilao;
use App\Models\Lote;
use App\Repositories\CondicaoPagamento\CondicaoPagamentoRepositoryInterface;
use App\Repositories\Especie\EspecieRepositoryInterface;
use App\Repositories\Leilao\LeilaoRepositoryInterface;
use App\Repositories\Lote\LoteRepositoryInterface;
use App\Repositories\PlanoPagamento\PlanoPagamentoRepositoryInterface;
use App\Repositories\Raca\RacaRepositoryInterface;

class LoteShowAction
{
    public function __construct(
        protected Lote $lote,
        protected Leilao $leilao
    )
    { }

    public function execute(string $leilaoUuid, string $loteUuid) : array
    {
        $lote = $this->lote->with('compras.cliente', 'compras.vendedor', 'compras.parcelas', 'vendedores')
                    ->where('uuid', $loteUuid)
                    ->firstOrFail();

        $leilao = $this->leilao->where('uuid', $leilaoUuid)->firstOrFail();

        return [
            'leilao' => $leilao,
            'lote' => $lote
        ];
    }
}
