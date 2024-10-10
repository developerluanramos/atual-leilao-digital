<?php

namespace App\Actions\Leilao;

use App\DTO\Leilao\LeilaoDeleteDTO;
use App\Repositories\Leilao\LeilaoRepositoryInterface;

class LeilaoDeleteAction
{
    public function __construct(
        protected LeilaoRepositoryInterface $repository
    ) { }

    public function exec(LeilaoDeleteDTO $dto)
    {
        $this->repository->delete($dto->uuid);
    }
}