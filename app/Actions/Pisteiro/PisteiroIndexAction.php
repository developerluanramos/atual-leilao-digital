<?php

namespace App\Actions\Pisteiro;

use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Pisteiro\PisteiroRepositoryInterface;

class PisteiroIndexAction
{
    public function __construct(
        protected PisteiroRepositoryInterface $repository
    ) { }

    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);        
    }
}