<?php

namespace App\Actions\Raca;

use App\DTO\Raca\RacaUpdateDTO;
use App\Models\Raca;
use App\Repositories\Raca\RacaRepositoryInterface;

class RacaUpdateAction
{
    public function __construct(
        protected RacaRepositoryInterface $repository
    ) { }

    public function exec(RacaUpdateDTO $dto): Raca
    {
        return $this->repository->update($dto);
    }
}