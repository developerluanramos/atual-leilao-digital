<?php

namespace App\Repositories\Pisteiro;

use App\DTO\Pisteiro\PisteiroStoreDTO;
use App\DTO\Pisteiro\PisteiroUpdateDTO;
use App\Models\Pisteiro;
use App\Repositories\Interfaces\PaginationInterface;

interface PisteiroRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): Pisteiro;

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;

    public function new(PisteiroStoreDTO $dto): Pisteiro;

    public function update(PisteiroUpdateDTO $dto): Pisteiro;
}