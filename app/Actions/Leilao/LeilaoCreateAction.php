<?php

namespace App\Actions\Leilao;

use App\Repositories\Leiloeiro\LeiloeiroRepositoryInterface;
use App\Repositories\PlanoPagamento\PlanoPagamentoRepositoryInterface;

class LeilaoCreateAction
{
    protected $leiloeiroRepository;
    protected $planoPagamentoRepository;

    public function __construct(
        LeiloeiroRepositoryInterface $leiloeiroRepository,
        PlanoPagamentoRepositoryInterface $planoPagamentoRepository
    )
    {
        $this->leiloeiroRepository = $leiloeiroRepository;
        $this->planoPagamentoRepository = $planoPagamentoRepository;
    }

    public function execute() : array
    {
        return [
            'leiloeiros' => $this->leiloeiroRepository->all(),
            'planos_pagamento' => $this->planoPagamentoRepository->all()
        ];
    }
}
