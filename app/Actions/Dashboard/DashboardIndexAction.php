<?php

namespace App\Actions\Dashboard;

use App\Repositories\Cargo\LeilaoRepositoryInterface;
use App\Repositories\Fornecedor\FornecedorRepositoryInterface;
use App\Repositories\Servidor\ServidorRepositoryInterface;
use App\Repositories\Usuario\UsuarioRepositoryInterface;

class DashboardIndexAction
{
    public function __construct(
        protected LeilaoRepositoryInterface     $cargoRepositoryInterface,
        protected UsuarioRepositoryInterface    $usuarioRepositoryInterface,
        protected FornecedorRepositoryInterface $fornecedorRepositoryInterface
    ) { }

    public function exec(): array
    {
        return [
            'quantitativos' => [
                'fornecedores' => $this->fornecedorRepositoryInterface->totalQuantity(),
                'usuarios' => $this->usuarioRepositoryInterface->totalQuantity(),
                'cargos' => $this->cargoRepositoryInterface->totalQuantity(),
            ]
        ];
    }
}
