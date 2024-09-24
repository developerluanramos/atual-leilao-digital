<?php

namespace App\Actions\Promotor;

use App\DTO\Promotor\PromotorEditDTO;
use App\Repositories\Promotor\PromotorRepositoryInterface;

class PromotorEditAction
{
    public function __construct(
        protected PromotorRepositoryInterface $repository
    ) { }

    public function exec(PromotorEditDTO $dto)
    {
        return $this->repository->find($dto->uuid);
    }
}