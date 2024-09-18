<?php

namespace App\Actions\Leiloeiro;

use App\DTO\Leiloeiro\LeiloeiroDeleteDTO;
use App\Repositories\Leiloeiro\LeiloeiroRepositoryInterface;

class LeiloeiroDeleteAction
{
    public function __construct(
        protected LeiloeiroRepositoryInterface $repository
    ) { }

    public function exec(LeiloeiroDeleteDTO $dto)
    {
        return $this->repository->delete($dto);
    }
}