<?php

namespace App\Actions\Pisteiro;

use App\DTO\Pisteiro\PisteiroEditDTO;
use App\Repositories\Pisteiro\PisteiroRepositoryInterface;

class PisteiroEditAction
{
    public function __construct(
        protected PisteiroRepositoryInterface $repository
    ) { }

    public function exec(PisteiroEditDTO $dto)
    {
        return $this->repository->find($dto->uuid);
    }
}