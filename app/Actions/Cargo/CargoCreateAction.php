<?php

namespace App\Actions\Cargo;

use App\Repositories\Cargo\CargoRepositoryInterface;

class CargoCreateAction
{
    public function __construct(
        protected CargoRepositoryInterface $cargoRepository
    ) { }

    public function exec(): array
    {
        $cargos = $this->cargoRepository->all();

        return [
            "cargos" => $cargos,
        ];
    }
}


