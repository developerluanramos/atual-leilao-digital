<?php

namespace App\Repositories\Especie;

use App\DTO\Especie\EspecieStoreDTO;
use App\DTO\Especie\EspecieUpdateDTO;
use App\Models\Especie;
use App\Repositories\Interfaces\PaginationInterface;

interface EspecieRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): Especie;

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;

    public function new(EspecieStoreDTO $dto): Especie;

    public function update(EspecieUpdateDTO $dto): Especie;

    public function delete(string $uuid): void;
}
