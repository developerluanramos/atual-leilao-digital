<?php

namespace App\Repositories\Servidor;

use App\DTO\Servidor\ServidorStoreDTO;
use App\DTO\Servidor\ServidorUpdateDTO;
use App\Models\Servidor;
use App\Repositories\Interfaces\PaginationInterface;

interface ServidorRepositoryInterface
{
    public function all(array $filters): array;
    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;
    public function find(string $id): Servidor;
    public function new(ServidorStoreDTO $servidorStoreDTO): Servidor;
    public function update(ServidorUpdateDTO $servidorUpdateDTO): Servidor;
}
