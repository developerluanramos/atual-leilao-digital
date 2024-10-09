<?php

namespace App\Actions\PlanoPagamento;

use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\PlanoPagamento\PlanoPagamentoRepositoryInterface;

class PlanoPagamentoIndexAction
{
    public function __construct(
        protected PlanoPagamentoRepositoryInterface $repository
    ) { }

    public function exec(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        return $this->repository->paginate($page, $totalPerPage, $filter);        
    }
}