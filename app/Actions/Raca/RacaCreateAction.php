<?php

namespace App\Actions\Raca;

use App\Repositories\Raca\RacaRepositoryInterface;

class RacaCreateAction
{
    public function __construct(
        protected RacaRepositoryInterface $cargoRepository
    ) { }

    public function exec(): array
    {
        return [];
    }
}


