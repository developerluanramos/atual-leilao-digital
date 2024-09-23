<?php

namespace App\Actions\Especie;

use App\Repositories\Especie\EspecieRepositoryInterface;
use App\Repositories\Interfaces\PaginationInterface;

class EspecieIndexAction
{
    public function __construct(
        protected EspecieRepositoryInterface $repository
    ) { }
    
    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);
    }
}