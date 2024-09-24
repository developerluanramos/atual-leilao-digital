<?php

namespace App\Actions\Promotor;

use App\DTO\Promotor\PromotorDeleteDTO;
use App\Repositories\Promotor\PromotorRepositoryInterface;

class PromotorDeleteAction
{
    public function __construct(
        protected PromotorRepositoryInterface $repository
    ) { }

    public function exec(PromotorDeleteDTO $dto)
    {
        return $this->repository->delete($dto->uuid);
    }
}