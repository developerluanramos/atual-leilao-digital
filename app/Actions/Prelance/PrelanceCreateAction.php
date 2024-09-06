<?php

namespace App\Actions\Prelance;

use App\Repositories\Leilao\LeilaoRepositoryInterface;
use App\Repositories\Cliente\ClienteRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\Lote\LoteRepositoryInterface;

class PrelanceCreateAction
{
    protected $leilaoRepository;
    protected $clienteRepository;
    protected $loteRepository;

    public function __construct(
        LeilaoRepositoryInterface $leilaoRepository,
        ClienteRepositoryInterface $clienteRepository,
        LoteRepositoryInterface $loteRepository

    )
    {
        $this->leilaoRepository = $leilaoRepository;
        $this->clienteRepository = $clienteRepository;
        $this->loteRepository = $loteRepository;
    }

    public function exec(Request $request)
    {
        $leilao = $this->leilaoRepository->find($request->get('leilaoUuid'), []);
        $cliente = $request->get('clienteUuid') ? $this->clienteRepository->find($request->get('clienteUuid')) : null;
        $lote = $request->get('loteUuid') ? $this->loteRepository->find($request->get('loteUuid')) : null;

        return [
            "leilao" => $leilao,
            "cliente" => $cliente,
            "lote" => $lote
        ];
    }
}
