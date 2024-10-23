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

        $cliente->propriedades()->createMany($dto->propriedades);
        $cliente->contatos()->createMany($dto->contatos);
        
        return $cliente;
    }
}