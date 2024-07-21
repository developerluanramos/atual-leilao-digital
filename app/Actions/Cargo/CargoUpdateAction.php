<?php

namespace App\Actions\Cargo;

use App\DTO\Cargo\CargoUpdateDTO;
use App\Models\Cargo;
use App\Repositories\Cargo\LeilaoRepositoryInterface;

class CargoUpdateAction {

    public function __construct(
        protected LeilaoRepositoryInterface $repository
    )
    { }

    public function exec(CargoUpdateDTO $dto): Cargo
    {
        return $this->repository->update($dto);
    }

}
