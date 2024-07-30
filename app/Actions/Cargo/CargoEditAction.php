<?php

namespace App\Actions\Cargo;

use App\DTO\Cargo\CargoEditDTO;
use App\Models\Cargo;
use App\Repositories\Cargo\CargoRepositoryInterface;

class CargoEditAction {
    public function __construct(
        protected CargoRepositoryInterface $repository
    )
    { }

    public function exec(CargoEditDTO $dto): Cargo
    {
        return $this->repository->find($dto->uuid);
    }
}
