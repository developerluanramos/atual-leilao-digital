<?php

namespace App\Actions\Prelance;

use App\Repositories\Leilao\LeilaoRepositoryInterface;

class PrelanceIndexAction
{
    protected $leilaoRepository;
    public function __construct(LeilaoRepositoryInterface $leilaoRepository)
    {
        $this->leilaoRepository = $leilaoRepository;
    }

    public function exec(string $leilaoUuid)
    {
        return $this->leilaoRepository->find($leilaoUuid, [
            'lotes', 'config_prelance.plano_pagamento',
        ]);
    }
}
