<?php

namespace App\Actions\Compra;

use App\DTO\Compra\CompraStoreDTO;
use App\Enums\StatusLoteEnum;
use App\Models\Compra;
use App\Models\Lote;
use App\Models\Parcela;

class CompraStoreAction
{
    protected $compraRepository;
    protected $loteRepository;
    protected $parcelaRepository;

    public function __construct (
        Compra $compraRepository,
        Lote $loteRepository,
        Parcela $parcelaRepository
    ) {
        $this->compraRepository = $compraRepository;
        $this->loteRepository = $loteRepository;
        $this->parcelaRepository = $parcelaRepository;
    }

    public function execute(CompraStoreDTO $compraStoreDTO) : Compra
    {
        foreach ($compraStoreDTO->clientes as $index => $cliente)
        {
            $compraStoreDTO->cliente_uuid = $cliente['uuid'];
            $compraStoreDTO->percentual_cota = (1 / count($compraStoreDTO->clientes)) * 100;
            $compra = $this->compraRepository::create((array)$compraStoreDTO);

            foreach($compraStoreDTO->parcelas as $index => $parcela) {
                $parcela['numero'] = $index + 1;
                $parcela['compra_uuid'] = $compra->uuid;
                $parcela['cliente_uuid'] = $cliente['uuid'];

                $this->parcelaRepository::create($parcela);
            }
        }
        
        $lote = $this->loteRepository::where('uuid', $compraStoreDTO->lote_uuid)->first();
        $lote->update([
            'status' => (string)StatusLoteEnum::FECHADO
        ]);

        return $compra;
    }
}
