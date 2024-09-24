<?php

namespace App\Actions\Promotor;

use App\DTO\Promotor\PromotorUpdateDTO;
use App\Repositories\Promotor\PromotorRepositoryInterface;

class PromotorUpdateAction
{
    public function __construct(
        protected PromotorRepositoryInterface $repository
    ) { }

    public function exec(PromotorUpdateDTO $dto)
    {
        return $this->repository->update($dto);
    }
}