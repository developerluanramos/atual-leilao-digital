<?php

namespace App\Actions\Leilao;

use App\Repositories\Leiloeiro\LeiloeiroRepositoryInterface;
use App\Repositories\PlanoPagamento\PlanoPagamentoRepositoryInterface;
use App\Repositories\Promotor\PromotorRepositoryInterface;

class LeilaoCreateAction
{
    protected $leiloeiroRepository;
    protected $planoPagamentoRepository;
    protected $promotorRepository;

    public function __construct(
        LeiloeiroRepositoryInterface $leiloeiroRepository,
        PlanoPagamentoRepositoryInterface $planoPagamentoRepository,
        PromotorRepositoryInterface $promotorRepository
    )
    {
        $this->leiloeiroRepository = $leiloeiroRepository;
        $this->planoPagamentoRepository = $planoPagamentoRepository;
        $this->promotorRepository = $promotorRepository;
    }

    public function execute() : array
    {
        return [
            'leiloeiros' => $this->leiloeiroRepository->all(),
            'planos_pagamento' => $this->planoPagamentoRepository->all(),
            'promotores' => $this->promotorRepository->all()
        ];
    }
}
