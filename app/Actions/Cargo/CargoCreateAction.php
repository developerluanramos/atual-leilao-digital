<?php

namespace App\Actions\Cargo;

use App\Repositories\Cargo\LeilaoRepositoryInterface;

class CargoCreateAction
{
    public function __construct(
        protected LeilaoRepositoryInterface $cargoRepository
    ) { }

    public function exec(): array
    {
        $cargos = $this->cargoRepository->all();

        return [
            "cargos" => $cargos,
        ];
    }
}


