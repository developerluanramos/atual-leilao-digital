<?php

namespace App\Actions\Cliente;

use App\DTO\Cliente\ClienteDeleteDTO;
use App\Models\Cliente;

class ClienteDeleteAction
{
    public function __construct(
        protected Cliente $model
    ) {}

    public function exec(ClienteDeleteDTO $dto)
    {
        $cliente = $this->model->where('uuid', $dto->uuid)->firstOrFail();
        $cliente->delete();
    }
}