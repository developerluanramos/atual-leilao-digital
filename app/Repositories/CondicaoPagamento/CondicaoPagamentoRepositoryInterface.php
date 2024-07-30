<?php

namespace App\Repositories\CondicaoPagamento;

use App\Models\CondicaoPagamento;
use App\Repositories\Interfaces\PaginationInterface;

interface CondicaoPagamentoRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): CondicaoPagamento;

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;
}
