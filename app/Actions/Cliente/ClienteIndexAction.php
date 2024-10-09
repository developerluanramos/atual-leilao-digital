<?php

namespace App\Actions\Cliente;

use App\Repositories\Cliente\ClienteRepositoryInterface;
use App\Repositories\Interfaces\PaginationInterface;

class ClienteIndexAction
{
    public function __construct(
        protected ClienteRepositoryInterface $repository
    ) { }

    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);
    }
}