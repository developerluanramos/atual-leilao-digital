<?php

namespace App\Repositories\Especie;

use App\DTO\Especie\EspecieStoreDTO;
use App\Models\Especie;
use App\Repositories\Interfaces\PaginationInterface;

interface EspecieRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): Especie;

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;

    public function new(EspecieStoreDTO $dto): Especie;
}
