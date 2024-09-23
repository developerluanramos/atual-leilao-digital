<?php

namespace App\Actions\Especie;

use App\DTO\Especie\EspecieDeleteDTO;
use App\Repositories\Especie\EspecieRepositoryInterface;

class EspecieDeleteAction
{
    public function __construct(
        protected EspecieRepositoryInterface $repository
    ) { }

    public function exec(EspecieDeleteDTO $dto)
    {
        return $this->repository->delete($dto->uuid);
    }
}