<?php

namespace App\Actions\Leilao\Lote;

use App\DTO\Leilao\Lote\LoteEditDTO;
use App\Models\Lote;

class LoteEditAction
{
    protected $model;

    public function __construct(Lote $model) 
    { 
        $this->model = $model;
    }

    public function exec(LoteEditDTO $dto)
    {
        return $this->model
            ->with('plano_pagamento.condicoes_pagamento', 'itens.especie', 'itens.raca')
            ->where('uuid', $dto->uuid)->firstOrFail();
    }
}