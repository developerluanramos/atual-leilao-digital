<?php

namespace App\Actions\Leilao\Lote;

use App\DTO\Leilao\Lote\LoteStoreDTO;
use App\Models\Lote;

class LoteStoreAction
{
    protected $lote;

    public function __construct(Lote $lote)
    { 
        $this->lote = $lote;
    }

    public function execute(LoteStoreDTO $leilaoStoreDTO) : Lote
    {
        $lote = $this->lote->create((array)$leilaoStoreDTO);
        $lote->itens()->createMany($leilaoStoreDTO->lote_itens);
        
        foreach($this->lote->itens()->get() as $index => $item) {
            $item->imagens()->createMany($leilaoStoreDTO->lote_itens[$index]["imagens"]);
            $item->videos()->createMany($leilaoStoreDTO->lote_itens[$index]["videos"]);
        }

        return $this->lote;
    }
}
