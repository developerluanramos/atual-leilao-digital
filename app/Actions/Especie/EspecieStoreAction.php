<?php

namespace App\Actions\Especie;

use App\DTO\Especie\EspecieStoreDTO;
use App\Models\Especie;
use App\Repositories\Especie\EspecieRepositoryInterface;

class EspecieStoreAction
{
    public function __construct(
        protected EspecieRepositoryInterface $repository
    ) { }

    public function exec(EspecieStoreDTO $dto): Especie
    {
        return $this->repository->new($dto);
    }
}