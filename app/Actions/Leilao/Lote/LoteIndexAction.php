<?php

namespace App\Actions\Leilao\Lote;

use App\Repositories\Leilao\LeilaoRepositoryInterface;
use App\Repositories\Lote\LoteRepositoryInterface;

class LoteIndexAction
{
    protected $leilaoRepository;
    protected $loteRepository;

    public function __construct(
        LeilaoRepositoryInterface $leilaoRepository,
        LoteRepositoryInterface $loteRepository
    )
    {
        $this->leilaoRepository = $leilaoRepository;
        $this->loteRepository = $loteRepository;
    }

    public function execute(int $page = 1, int $totalPerPage = 10, string $filter = null, string $leilaoUuid)
    {
        $leilao = $this->leilaoRepository->find($leilaoUuid, []);
        $lotes = $this->loteRepository->paginateByLeilaoUuid(
            $page,
            $totalPerPage,
            $filter,
            $leilaoUuid
        );

        return [
            'leilao' => $leilao,
            'lotes' => $lotes,
        ];
    }
}
