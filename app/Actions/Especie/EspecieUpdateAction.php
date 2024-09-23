<?php

namespace App\Actions\Especie;

use App\DTO\Especie\EspecieUpdateDTO;
use App\Models\Especie;
use App\Repositories\Especie\EspecieRepositoryInterface;

class EspecieUpdateAction
{
    public function __construct(
        protected EspecieRepositoryInterface $repository
    ) { }

    public function exec(EspecieUpdateDTO $dto): Especie
    {
        return $this->repository->update($dto);
    }
}