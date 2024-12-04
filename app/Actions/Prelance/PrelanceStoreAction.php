<?php

namespace App\Actions\Prelance;

use App\DTO\Prelance\PrelanceStoreDTO;
use App\Models\Lance;

class PrelanceStoreAction
{
    public function exec(PrelanceStoreDTO $prelanceStoreDTO)
    {
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
}
