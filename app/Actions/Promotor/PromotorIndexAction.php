<?php

namespace App\Actions\Promotor;

use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Promotor\PromotorRepositoryInterface;

class PromotorIndexAction
{
    public function __construct(
        protected PromotorRepositoryInterface $repository
    ) { }

    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);
    }
}