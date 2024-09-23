<?php

namespace App\Actions\Promotor;

use App\DTO\Promotor\PromotorStoreDTO;
use App\Repositories\Promotor\PromotorRepositoryInterface;

class PromotorStoreAction
{
    public function __construct(
        protected PromotorRepositoryInterface $repository
    ) { }

    public function exec(PromotorStoreDTO $dto)
    {
        return $this->repository->new($dto);
    }
}