<?php

namespace App\Actions\Compra;

use App\DTO\Compra\CompraStoreDTO;
use App\Enums\StatusLoteEnum;
use App\Models\Compra;
use App\Models\Lote;
use App\Models\Parcela;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();

        $this->loteRepository = $this->loteRepository::with('vendedores')->where('uuid', $compraStoreDTO->lote_uuid)->first();
        $this->loteRepository->update([
            'status' => (string)StatusLoteEnum::FECHADO
        ]);

        foreach($this->loteRepository->vendedores as $vendedor) 
        {
            foreach ($compraStoreDTO->clientes as $index => $cliente)
            {
                $compraStoreDTO->cliente_uuid = $cliente['uuid'];
                $compraStoreDTO->vendedor_uuid = $vendedor->uuid;
                $compraStoreDTO->percentual_cota = (1 / count($compraStoreDTO->clientes)) * 100;
                //dd($vendedor->pivot->percentual_cota);
                //$valorCalculadoPorCotaVendedor = dd($vendedor);
                $compraStoreDTO->valor = ($vendedor->pivot->percentual_cota / 100) * $compraStoreDTO->valor;
                $this->compraRepository = $this->compraRepository::create((array)$compraStoreDTO);
    
                foreach($compraStoreDTO->parcelas as $index => $parcela) {
                    $parcela['numero'] = $index + 1;
                    $parcela['compra_uuid'] = $this->compraRepository->uuid;
                    $parcela['cliente_uuid'] = $cliente['uuid'];
    
                    $this->parcelaRepository::create($parcela);
                }
            }
        }
        
        // $this->loteRepository = $this->loteRepository::where('uuid', $compraStoreDTO->lote_uuid)->first();
        // $this->loteRepository->update([
        //     'status' => (string)StatusLoteEnum::FECHADO
        // ]);

        DB::commit();

        return $this->compraRepository;
    }
}
