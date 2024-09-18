<?php

namespace App\Repositories\Leiloeiro;

use App\DTO\Leiloeiro\LeiloeiroStoreDTO;
use App\DTO\Leiloeiro\LeiloeiroUpdateDTO;
use App\Models\Leiloeiro;
use App\Repositories\Interfaces\PaginationInterface;

interface LeiloeiroRepositoryInterface
{
    public function all();

    public function totalQuantity() : int;

    public function find(string $uuid): Leiloeiro;

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;

    public function new(LeiloeiroStoreDTO $dto): Leiloeiro;

    public function update(LeiloeiroUpdateDTO $dto):Leiloeiro;
}
