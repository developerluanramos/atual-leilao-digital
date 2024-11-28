<?php

namespace App\Actions\Leilao\Lote;

use App\DTO\Leilao\Lote\LoteUpdateDTO;
use App\Models\Lote;
use App\Models\LoteItem;
use App\Models\LoteVendedor;

class LoteUpdateAction
{
    protected $loteModel;
    protected $loteItemModel;
    protected $loteVendedorModel;

    public function __construct(
        Lote $loteModel, 
        LoteItem $loteItemModel,
        LoteVendedor $loteVendedorModel)
    { 
        $this->loteModel = $loteModel;
        $this->loteItemModel = $loteItemModel;
        $this->loteVendedorModel = $loteVendedorModel;
    }

    public function execute(LoteUpdateDTO $dto) : Lote
    {
        $this->loteModel = $this->loteModel
            ->with('plano_pagamento.condicoes_pagamento', 'itens.especie', 'itens.raca')
            ->where('uuid', $dto->uuid)->firstOrFail();
        
        $this->loteModel->update((array) $dto);
        $this->loteItemModel->destroy($this->loteModel->itens()->pluck('id'));

        $this->loteModel->itens()->createMany($dto->lote_itens);

        $this->loteModel->vendedores()->detach();
        
        foreach($dto->lote_vendedores as $index => $vendedor)
        {
            $this->loteModel->vendedores()->attach($vendedor['uuid'], ['percentual_cota' => $vendedor['percentual_cota']]);
        }

        return $this->loteModel;
    }
}
