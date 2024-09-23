<?php

namespace App\Actions\Pisteiro;

use App\DTO\Pisteiro\PisteiroUpdateDTO;
use App\Repositories\Pisteiro\PisteiroRepositoryInterface;

class PisteiroUpdateAction
{
    public function __construct(
        protected PisteiroRepositoryInterface $repository
    ) { }

    public function exec(PisteiroUpdateDTO $dto)
    {
        return $this->repository->update($dto);
    }
}