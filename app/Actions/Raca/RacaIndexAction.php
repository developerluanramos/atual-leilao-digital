<?php

namespace App\Actions\Raca;

use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Raca\RacaRepositoryInterface;

class RacaIndexAction
{
    public function __construct(
        protected RacaRepositoryInterface $repository
    ) { }

    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);
    }
}