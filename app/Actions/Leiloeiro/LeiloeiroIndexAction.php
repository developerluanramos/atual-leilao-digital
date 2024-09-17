<?php

namespace App\Actions\Leiloeiro;

use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Leiloeiro\LeiloeiroRepositoryInterface;

class LeiloeiroIndexAction
{
    public function __construct(
        protected LeiloeiroRepositoryInterface $repository
    ) { }

    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);
    }
}