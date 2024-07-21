<?php

namespace App\Actions\Cargo;

use App\Repositories\Cargo\LeilaoRepositoryInterface;
use App\Repositories\Interfaces\PaginationInterface;

class CargoIndexAction
{
    public function __construct(
        protected LeilaoRepositoryInterface $repository
    ) { }

    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);
    }
}
