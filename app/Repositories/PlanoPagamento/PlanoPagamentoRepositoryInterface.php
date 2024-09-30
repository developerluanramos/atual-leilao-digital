<?php

namespace App\Repositories\PlanoPagamento;

use App\Models\PlanoPagamento;
use App\Repositories\Interfaces\PaginationInterface;

interface PlanoPagamentoRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): PlanoPagamento;

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;

    public function delete(string $uuid): void;
}
