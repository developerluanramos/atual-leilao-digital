<?php

namespace App\Actions\Raca;

use App\DTO\Raca\RacaEditDTO;
use App\Models\Raca;
use App\Repositories\Raca\RacaRepositoryInterface;

class RacaEditAction
{
    public function __construct(
        protected RacaRepositoryInterface $repository
    ) { }

    public function exec(RacaEditDTO $dto): Raca
    {
        return $this->repository->find($dto->uuid);
    }
}