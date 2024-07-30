<?php

namespace App\Repositories\Lote;

use App\Models\Lote;
use App\Repositories\Interfaces\PaginationInterface;

interface LoteRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): Lote;

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;
    public function paginateByLeilaoUuid(int $page = 1, int $totalPerPage = 10, string $filter = null, string $leilaoUuid): PaginationInterface;
}
