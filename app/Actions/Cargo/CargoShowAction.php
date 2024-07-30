<?php

namespace App\Actions\Cargo;

use App\DTO\Cargo\CargoShowDTO;
use App\Models\Cargo;
use App\Repositories\Cargo\CargoRepositoryInterface;

class CargoShowAction {
    public function __construct(
        protected CargoRepositoryInterface $repository
    ) { }

    public function exec(CargoShowDTO $dto): Cargo
    {
        return $this->repository->find($dto->uuid);
    }
}
