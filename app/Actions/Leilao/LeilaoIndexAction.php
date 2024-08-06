<?php

namespace App\Actions\Leilao;

use App\Repositories\Leilao\LeilaoRepositoryInterface;

class LeilaoIndexAction
{
    protected $repository;

    public function __construct(LeilaoRepositoryInterface $leilaoRepository)
    {
        $this->repository = $leilaoRepository;
    }

    public function exec(int $page = 1, int $totalPerPage = 20, array $filters)
    {
        return $this->repository->paginate(1, 20, null);
    }
}
