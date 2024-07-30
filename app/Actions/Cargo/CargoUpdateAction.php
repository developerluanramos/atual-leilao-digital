<?php

namespace App\Actions\Cargo;

use App\DTO\Cargo\CargoUpdateDTO;
use App\Models\Cargo;
use App\Repositories\Cargo\CargoRepositoryInterface;

class CargoUpdateAction {

    public function __construct(
        protected CargoRepositoryInterface $repository
    )
    { }

    public function exec(CargoUpdateDTO $dto): Cargo
    {
        return $this->repository->update($dto);
    }

}
