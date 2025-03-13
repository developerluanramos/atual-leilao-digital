<?php

namespace App\Actions\Prelance;

use App\DTO\Prelance\PrelanceStoreDTO;
use App\Models\Lance;
use Illuminate\Support\Facades\DB;

class PrelanceStoreAction
{
    public function exec(PrelanceStoreDTO $prelanceStoreDTO)
    {
        DB::beginTransaction();

        $lance = Lance::create((array)$prelanceStoreDTO);

        array_walk($prelanceStoreDTO->clientes, function(&$entry, $key) use ($prelanceStoreDTO) { 
            $entry['leilao_uuid'] = $prelanceStoreDTO->leilao_uuid;
            $entry['lote_uuid'] = $prelanceStoreDTO->lote_uuid;
        });
        
        $lance->clientes()->attach(array_column($prelanceStoreDTO->clientes, 'uuid'), [
            'leilao_uuid' => $prelanceStoreDTO->leilao_uuid,
            'lote_uuid' => $prelanceStoreDTO->lote_uuid,
        ]);

        // -- inclui pré-lance para os lotes extras se houverem
        foreach($prelanceStoreDTO->lotesExtras as $loteExtra)
        {
            
            $prelanceStoreDTO->lote_uuid = $loteExtra['uuid'];
            
            $lance = Lance::create((array)$prelanceStoreDTO);
            
            array_walk($prelanceStoreDTO->clientes, function(&$entry, $key) use ($prelanceStoreDTO) { 
                $entry['leilao_uuid'] = $prelanceStoreDTO->leilao_uuid;
                $entry['lote_uuid'] = $prelanceStoreDTO->lote_uuid;
            });
            
            $lance->clientes()->attach(array_column($prelanceStoreDTO->clientes, 'uuid'), [
                'leilao_uuid' => $prelanceStoreDTO->leilao_uuid,
                'lote_uuid' => $prelanceStoreDTO->lote_uuid,
            ]);
        }

        DB::commit();
    }
}
