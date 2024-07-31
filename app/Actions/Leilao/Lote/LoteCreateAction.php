<?php

namespace App\Actions\Leilao\Lote;

use App\Models\Lote;
use App\Repositories\CondicaoPagamento\CondicaoPagamentoRepositoryInterface;
use App\Repositories\Especie\EspecieRepositoryInterface;
use App\Repositories\Leilao\LeilaoRepositoryInterface;
use App\Repositories\Lote\LoteRepositoryInterface;
use App\Repositories\PlanoPagamento\PlanoPagamentoRepositoryInterface;
use App\Repositories\Raca\RacaRepositoryInterface;

class LoteCreateAction
{
    protected $leilaoRepository;
    protected $racaRepository;
    protected $especieRepository;
    protected $planoPagamentoRepository;

    public function __construct(
        LeilaoRepositoryInterface $leilaoRepository,
        RacaRepositoryInterface $racaRepository,
        EspecieRepositoryInterface $especieRepository,
        PlanoPagamentoRepositoryInterface $planoPagamentoRepository,
    )
    {
        $this->leilaoRepository = $leilaoRepository;
        $this->racaRepository = $racaRepository;
        $this->especieRepository = $especieRepository;
        $this->planoPagamentoRepository = $planoPagamentoRepository;
    }

    public function execute(string $leilaoUuid) : array
    {
        return [
            'leilao' => $this->leilaoRepository->find($leilaoUuid),
            'racas' => $this->racaRepository->all(),
            'especies' => $this->especieRepository->all(),
            'planos_pagamentos' => $this->planoPagamentoRepository->all(),
        ];
    }
}
