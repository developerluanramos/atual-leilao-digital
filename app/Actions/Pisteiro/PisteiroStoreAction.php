<?php

namespace App\Actions\Pisteiro;

use App\DTO\Pisteiro\PisteiroStoreDTO;
use App\Repositories\Pisteiro\PisteiroRepositoryInterface;

class PisteiroStoreAction
{
    public function __construct(
        protected PisteiroRepositoryInterface $repository
    ) { }

    public function exec(PisteiroStoreDTO $dto)
    {
        return $this->repository->new($dto);
    }
}