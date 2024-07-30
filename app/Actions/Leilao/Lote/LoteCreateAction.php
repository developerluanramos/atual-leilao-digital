<?php

namespace App\Actions\Leilao\Lote;

use App\Models\Lote;
use App\Repositories\Leilao\LeilaoRepositoryInterface;
use App\Repositories\Lote\LoteRepositoryInterface;

class LoteCreateAction
{
    protected $leilaoRepository;
//    protected $loteRepository;

    public function __construct(
        LeilaoRepositoryInterface $leilaoRepository,
//        LoteRepositoryInterface $loteRepository
    )
    {
        $this->leilaoRepository = $leilaoRepository;
//        $this->loteRepository = $loteRepository;
    }

    public function execute(string $leilaoUuid)
    {
        $leilao = $this->leilaoRepository->find($leilaoUuid);
        // $lotes = $this->loteRepository->paginateByLeilaoUuid($page, $totalPerPage, $filter, $leilaoUuid);

        return [
            'leilao' => $leilao,
//            'lotes' => $lotes
        ];
    }
}
