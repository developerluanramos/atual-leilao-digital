<?php

namespace App\Actions\Leiloeiro;

use App\DTO\Leiloeiro\LeiloeiroStoreDTO;
use App\Models\Leiloeiro;
use App\Repositories\Leiloeiro\LeiloeiroRepositoryInterface;

class LeiloeiroStoreAction
{
    public function __construct(
        protected LeiloeiroRepositoryInterface $repository
    ) { }

    public function exec(LeiloeiroStoreDTO $dto): Leiloeiro
    {
        return $this->repository->new($dto);
    }
}