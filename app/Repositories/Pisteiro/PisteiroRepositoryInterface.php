<?php

namespace App\Repositories\Pisteiro;

use App\Models\Pisteiro;
use App\Repositories\Interfaces\PaginationInterface;

interface PisteiroRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): Pisteiro;

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;
}