<?php

namespace App\Actions\Leilao\Lote;

use App\DTO\Leilao\Lote\LoteStoreDTO;
use App\Models\Lote;

class LoteStoreAction
{
    protected $leilaoRepository;

    public function __construct()
    { }

    public function execute(string $leilaoUuid, LoteStoreDTO $leilaoStoreDTO) : Lote
    {
        $lote = Lote::create((array)$leilaoStoreDTO);

        $lote->itens()->createMany($leilaoStoreDTO->lote_itens);

        return $lote;
    }
}
