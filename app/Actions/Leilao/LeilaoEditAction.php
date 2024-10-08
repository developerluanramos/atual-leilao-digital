<?php

namespace App\Actions\Leilao;

use App\DTO\Leilao\LeilaoEditDTO;
use App\Repositories\Leilao\LeilaoRepositoryInterface;

class LeilaoEditAction
{
    public function __construct(
        protected LeilaoRepositoryInterface $repository
    ) { }

    public function exec(LeilaoEditDTO $dto)
    {
        $relacionamentos = [
            'promotor',
            'pregoeiro',
            'leiloeiro',
            'config_prelance'
        ];

        $leilao = $this->repository->find($dto->uuid, $relacionamentos);

        return LeilaoEditDTO::makeFromAction($leilao);
    }
}