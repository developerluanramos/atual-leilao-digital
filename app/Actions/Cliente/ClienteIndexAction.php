<?php

namespace App\Actions\Cliente;

use App\Repositories\Cliente\ClienteRepositoryInterface;
use App\Repositories\Interfaces\PaginationInterface;

class ClienteIndexAction
{
    protected $clienteRepository;

    public function __construct(
        ClienteRepositoryInterface $clienteRepository
    )
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function execute(int $page = 1, int $totalPerPage = 10, string $filter = null,) : PaginationInterface
    {
        return $this->clienteRepository->paginate($page, $totalPerPage, $filter);
    }
}
