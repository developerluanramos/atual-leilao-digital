<?php

namespace App\Actions\Cargo;

use App\DTO\Cargo\CargoEditDTO;
use App\Models\Cargo;
use App\Repositories\Cargo\LeilaoRepositoryInterface;

class CargoEditAction {
    public function __construct(
        protected LeilaoRepositoryInterface $repository
    )
    { }

    public function exec(CargoEditDTO $dto): Cargo
    {
        return $this->repository->find($dto->uuid);
    }
}
