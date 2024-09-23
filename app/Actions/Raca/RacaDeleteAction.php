<?php

namespace App\Actions\Raca;

use App\DTO\Raca\RacaDeleteDTO;
use App\Repositories\Raca\RacaRepositoryInterface;

class RacaDeleteAction
{
    public function __construct(
        protected RacaRepositoryInterface $repository
    ) { }

    public function exec(RacaDeleteDTO $dto)
    {
        return $this->repository->delete($dto->uuid);
    }
}