<?php

namespace App\Actions\Especie;

use App\DTO\Especie\EspecieEditDTO;
use App\Repositories\Especie\EspecieRepositoryInterface;

class EspecieEditAction
{
    public function __construct(
        protected EspecieRepositoryInterface $repository
    ) { }

    public function exec(EspecieEditDTO $dto) 
    {
        return $this->repository->find($dto->uuid);
    }
}