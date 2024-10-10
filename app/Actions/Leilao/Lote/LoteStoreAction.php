<?php

namespace App\Actions\Leilao\Lote;

use App\DTO\Leilao\Lote\LoteStoreDTO;
use App\Models\Lote;
use App\Models\LoteItemImagem;
use Illuminate\Support\Facades\Storage;

class LoteStoreAction
{
    protected $leilaoRepository;

    public function __construct()
    { }

    public function execute(LoteStoreDTO $leilaoStoreDTO) : Lote
    {
        $lote = Lote::create((array)$leilaoStoreDTO);
        $lote->itens()->createMany($leilaoStoreDTO->lote_itens);
        
        foreach($lote->itens()->get() as $index => $item) {
            $imagens = array_map(function($imagem) use ($item) {
                $imagem['lote_item_uuid'] = $item['uuid'];
                return $imagem;
            }, $leilaoStoreDTO->lote_itens[$index]["imagens"]);

            $videos = array_map(function($video) use ($item) {
                $video['lote_item_uuid'] = $item['uuid'];
                return $video;
            }, $leilaoStoreDTO->lote_itens[$index]["videos"]);

            $item->imagens()->createMany($imagens);
            $item->videos()->createMany($videos);
        }

        return $lote;
    }
}
