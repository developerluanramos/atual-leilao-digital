<?php

namespace App\Actions\Leilao;

use App\DTO\Leilao\LeilaoStoreDTO;
use App\Models\Leilao;

class LeilaoStoreAction
{
    protected Leilao $leilao;

    public function __construct(
        Leilao $leilao
    ) { 
        $this->leilao = $leilao;
    }

    public function exec(LeilaoStoreDTO $dto): Leilao
    {
        $leilao = $this->leilao->create((array) $dto);
        $leilao->config_prelance()->saveMany($dto->configPreLance);

        return $this->leilao;
    }
}