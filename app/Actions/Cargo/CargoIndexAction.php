<?php

namespace App\Actions\Cargo;

use App\Repositories\Cargo\CargoRepositoryInterface;
use App\Repositories\Interfaces\PaginationInterface;

class CargoIndexAction
{
    public function __construct(
        protected CargoRepositoryInterface $repository
    ) { }

    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);
    }
}
