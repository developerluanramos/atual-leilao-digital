<?php

namespace App\Actions\Compra;

use App\DTO\Compra\CompraStoreDTO;
use App\Enums\StatusLoteEnum;
use App\Models\Compra;
use App\Models\Lote;

class CompraStoreAction
{
    protected $leilaoRepository;
    protected $loteRepository;

    public function __construct()
    {}

    public function execute(CompraStoreDTO $compraStoreDTO) : Compra
    {
        $lote = Lote::where('uuid', $compraStoreDTO->lote_uuid)->first();
        $lote->update(['status' => (string)StatusLoteEnum::FECHADO]);

        $compra = Compra::create((array)$compraStoreDTO);
        $compra->clientes()->attach(array_column($compraStoreDTO->clientes, 'uuid'));
        
        return $compra;
    }
}
