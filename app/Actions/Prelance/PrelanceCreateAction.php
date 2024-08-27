<?php

namespace App\Actions\Prelance;

use App\Repositories\Leilao\LeilaoRepositoryInterface;
use App\Repositories\Cliente\ClienteRepositoryInterface;
use Illuminate\Http\Request;
// use App\Repositories\Lote\LoteRepositoryInterface;
// use App\Repositories\Prelance\PrelanceRepositoryInterface;

class PrelanceCreateAction
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

    public function exec(Request $request)
    {
        return [
            'leilao' => $this->leilaoRepository->find($request->get('leilaoUuid')),
            "formData" => [
                "clienteUuid" => $request->get('clienteUuid'),
                "loteUuid" => $request->get('loteUuid'),
            ],
            // 'vendedores' => $this->clienteRepository->vendedoresByLeilaoUuid($leilaoUuid),
            // 'compradores' => $this->clienteRepository->compradoresByLeilaoUuid($leilaoUuid),
            // 'comissoes' => [],
            // 'total_lances' => 0,
            // 'total_lances_vencedores' => 0
        ];
    }
}
