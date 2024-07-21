<?php

namespace App\Actions\Cargo;

use App\DTO\Cargo\CargoShowDTO;
use App\Models\Cargo;
use App\Repositories\Cargo\LeilaoRepositoryInterface;

class CargoShowAction {
    public function __construct(
        protected LeilaoRepositoryInterface $repository
    ) { }

    public function exec(CargoShowDTO $dto): Cargo
    {
        return $this->repository->find($dto->uuid);
    }
}
