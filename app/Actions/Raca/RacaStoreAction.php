<?php

namespace App\Actions\Raca;

use App\DTO\Raca\RacaStoreDTO;
use App\Models\Raca;
use App\Repositories\Raca\RacaRepositoryInterface;

class RacaStoreAction
{
    public function __construct(
        protected RacaRepositoryInterface $repository
    ) { }

    public function exec(RacaStoreDTO $dto): Raca
    {
        return $this->repository->new($dto);
    }
}