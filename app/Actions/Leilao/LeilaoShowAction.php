<?php

namespace App\Actions\Leilao;

use App\Repositories\Leilao\LeilaoRepositoryInterface;

class LeilaoShowAction
{
    protected $repository;

    public function __construct(LeilaoRepositoryInterface $leilaoRepository)
    {
        $this->repository = $leilaoRepository;
    }

    public function exec($leilaoUuid)
    {
        return $this->repository->find($leilaoUuid);
    }
}
