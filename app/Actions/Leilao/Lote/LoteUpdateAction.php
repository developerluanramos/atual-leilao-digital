<?php

namespace App\Actions\Leilao\Lote;

use App\DTO\Leilao\Lote\LoteUpdateDTO;
use App\Models\Lote;
use App\Models\LoteItem;

class LoteUpdateAction
{
    protected $loteModel;
    protected $loteItemModel;

    public function __construct(Lote $loteModel, LoteItem $loteItemModel)
    { 
        $this->loteModel = $loteModel;
        $this->loteItemModel = $loteItemModel;
    }

    public function execute(LoteUpdateDTO $dto) : Lote
    {
        $lote = $this->loteModel
            ->with('plano_pagamento.condicoes_pagamento', 'itens.especie', 'itens.raca')
            ->where('uuid', $dto->uuid)->firstOrFail();
        
        $lote->update((array) $dto);
        $this->loteItemModel->destroy($lote->itens()->pluck('id'));

        $lote->itens()->createMany($dto->lote_itens);
        
        return $this->loteModel;
    }
}
