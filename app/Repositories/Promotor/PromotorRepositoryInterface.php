<?php

namespace App\Repositories\Promotor;

use App\DTO\Promotor\PromotorStoreDTO;
use App\Models\Promotor;
use App\Repositories\Interfaces\PaginationInterface;

interface PromotorRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;

    public function new(PromotorStoreDTO $dto): Promotor;

    public function find(string $uuid): Promotor;
}