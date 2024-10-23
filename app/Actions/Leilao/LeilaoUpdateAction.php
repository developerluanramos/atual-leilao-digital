<?php

namespace App\Actions\Leilao;

use App\DTO\Leilao\LeilaoUpdateDTO;
use App\Models\PrelanceConfig;
use App\Repositories\Leilao\LeilaoRepositoryInterface;

class LeilaoUpdateAction
{
    public function __construct(
        protected LeilaoRepositoryInterface $repository
    ) {}

    public function exec(LeilaoUpdateDTO $dto)
    {   
        $relations = [
            'promotor',
            'pregoeiro',
            'leiloeiro',
            'config_prelance'
        ];

        $leilao = $this->repository->find($dto->uuid, $relations);
        $leilao->update((array) $dto);

        PrelanceConfig::destroy($leilao->config_prelance()->pluck('id'));

        $leilao->config_prelance()->saveMany($dto->configPreLance);

        return $leilao;
    }
}