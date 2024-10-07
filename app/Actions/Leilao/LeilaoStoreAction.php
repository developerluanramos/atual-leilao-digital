<?php

namespace App\Actions\Leilao;

use App\DTO\Leilao\LeilaoStoreDTO;
use App\Models\Leilao;

class LeilaoStoreAction
{
    public function __construct() { }

    public function exec(LeilaoStoreDTO $dto): Leilao
    {
        $leilao = Leilao::create((array) $dto);
        $leilao->config_prelance()->saveMany($dto->configPreLance);

        return $leilao;
    }
}