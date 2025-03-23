<?php

namespace App\Actions\Cliente;

use App\DTO\Cliente\ClienteStoreDTO;
use App\Models\Cliente;

class ClienteStoreAction
{
    public function __construct() { }

    public function exec(ClienteStoreDTO $dto): Cliente
    {
        $cliente = Cliente::create((array) $dto);

        !is_null($dto->propriedades) ? $cliente->propriedades()->createMany($dto->propriedades) : null;
        !is_null($dto->contatos) ? $cliente->contatos()->createMany($dto->contatos) : null;
        
        return $cliente;
    }
}