<?php

namespace App\Actions\Cliente;

use App\DTO\Cliente\ClienteEditDTO;
use App\Models\Cliente;
use App\Repositories\Cliente\ClienteRepositoryInterface;

class ClienteEditAction {
    public function __construct(
        protected ClienteRepositoryInterface $repository
    )
    { }

    public function exec(ClienteEditDTO $dto): Cliente
    {
        return $this->repository->find($dto->uuid);
    }
}
