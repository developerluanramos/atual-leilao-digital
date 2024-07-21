<?php

namespace App\Actions\Cargo;

use App\DTO\Cargo\CargoStoreDTO;
use App\Models\Cargo;
use App\Repositories\Cargo\LeilaoRepositoryInterface;

class CargoStoreAction {

    public function __construct(
        protected LeilaoRepositoryInterface $repository
    ) { }

    public function exec(CargoStoreDTO $dto): Cargo
    {
        return $this->repository->new($dto);
    }
}
