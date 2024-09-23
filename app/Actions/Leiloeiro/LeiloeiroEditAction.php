<?php

namespace App\Actions\Leiloeiro;

use App\DTO\Leiloeiro\LeiloeiroEditDTO;
use App\Models\Leiloeiro;
use App\Repositories\Leiloeiro\LeiloeiroRepositoryInterface;

class LeiloeiroEditAction
{
    public function __construct(
        protected LeiloeiroRepositoryInterface $repository
    ) { }

    public function exec(LeiloeiroEditDTO $dto): Leiloeiro
    {
        return $this->repository->find($dto->uuid);
    }
}