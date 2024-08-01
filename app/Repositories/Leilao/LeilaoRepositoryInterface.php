<?php

namespace App\Repositories\Leilao;

use App\Models\Leilao;
use App\Repositories\Interfaces\PaginationInterface;

interface LeilaoRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid, array $with): Leilao;

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;
}
