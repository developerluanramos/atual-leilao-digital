<?php

namespace App\Actions\Dashboard;

use App\Repositories\Cargo\CargoRepositoryInterface;
use App\Repositories\Fornecedor\FornecedorRepositoryInterface;
use App\Repositories\Servidor\ServidorRepositoryInterface;
use App\Repositories\Usuario\UsuarioRepositoryInterface;

class DashboardIndexAction
{
    public function __construct(
        protected CargoRepositoryInterface     $cargoRepositoryInterface,
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
