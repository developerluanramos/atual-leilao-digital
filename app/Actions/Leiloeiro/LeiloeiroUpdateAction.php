<?php

namespace App\Actions\Leiloeiro;

use App\DTO\Leiloeiro\LeiloeiroUpdateDTO;
use App\Models\Leiloeiro;
use App\Repositories\Leiloeiro\LeiloeiroRepositoryInterface;

class LeiloeiroUpdateAction
{
    public function __construct(
        protected LeiloeiroRepositoryInterface $repository
    ) { }

    public function exec(LeiloeiroUpdateDTO $dto): Leiloeiro
    {
        return $this->repository->update($dto);
    }
}