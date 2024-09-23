<?php

namespace App\Actions\Pisteiro;

use App\DTO\Pisteiro\PisteiroDeleteDTO;
use App\Repositories\Pisteiro\PisteiroRepositoryInterface;

class PisteiroDeleteAction
{
    public function __construct(
        protected PisteiroRepositoryInterface $repository
    ) { }

    public function exec(PisteiroDeleteDTO $dto)
    {
        return $this->repository->delete($dto->uuid);
    }
}