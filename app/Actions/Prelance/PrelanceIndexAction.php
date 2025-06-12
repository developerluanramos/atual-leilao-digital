<?php

namespace App\Actions\Prelance;

use App\Repositories\Leilao\LeilaoRepositoryInterface;
use App\Repositories\Cliente\ClienteRepositoryInterface;
// use App\Repositories\Lote\LoteRepositoryInterface;
// use App\Repositories\Prelance\PrelanceRepositoryInterface;

class PrelanceIndexAction
{
    protected $leilaoRepository;
    protected $clienteRepository;
    protected $loteRepository;
    protected $comissaoRepository;

    public function __construct(
        LeilaoRepositoryInterface $leilaoRepository,
        ClienteRepositoryInterface $clienteRepository,
        // LoteRepositoryInterface $loteRepository,
        // PrelanceRepositoryInterface $prelanceRepository

    )
    {
        $this->leilaoRepository = $leilaoRepository;
        $this->clienteRepository = $clienteRepository;
        // $this->loteRepository = $loteRepository;
        // $this->prelanceRepository = $prelanceRepository;
    }

    public function exec(string $leilaoUuid)
    {
        return [
            'leilao' => $this->leilaoRepository->find($leilaoUuid, ['config_prelance']),
            // 'vendedores' => $this->clienteRepository->vendedoresByLeilaoUuid($leilaoUuid),
            // 'compradores' => $this->clienteRepository->compradoresByLeilaoUuid($leilaoUuid),
            // 'comissoes' => [],
            // 'total_lances' => 0,
            // 'total_lances_vencedores' => 0
        ];
    }
}
