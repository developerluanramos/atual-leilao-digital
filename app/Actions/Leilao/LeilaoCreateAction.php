<?php

namespace App\Actions\Leilao;

use App\Repositories\Leiloeiro\LeiloeiroRepositoryInterface;
use App\Repositories\PlanoPagamento\PlanoPagamentoRepositoryInterface;
use App\Repositories\Pregoeiro\PregoeiroRepositoryInterface;
use App\Repositories\Promotor\PromotorRepositoryInterface;

class LeilaoCreateAction
{
    protected $leiloeiroRepository;
    protected $planoPagamentoRepository;
    protected $promotorRepository;
    protected $pregoeiroRepository;

    public function __construct(
        LeiloeiroRepositoryInterface $leiloeiroRepository,
        PlanoPagamentoRepositoryInterface $planoPagamentoRepository,
        PromotorRepositoryInterface $promotorRepository,
        PregoeiroRepositoryInterface $pregoeiroRepository
    )
    {
        $this->leiloeiroRepository = $leiloeiroRepository;
        $this->planoPagamentoRepository = $planoPagamentoRepository;
        $this->promotorRepository = $promotorRepository;
        $this->pregoeiroRepository = $pregoeiroRepository;
    }

    public function execute() : array
    {
        return [
            'leiloeiros' => $this->leiloeiroRepository->all(),
            'planos_pagamento' => $this->planoPagamentoRepository->all(),
            'promotores' => $this->promotorRepository->all(),
            'pregoeiros' => $this->pregoeiroRepository->all()
        ];
    }
}
