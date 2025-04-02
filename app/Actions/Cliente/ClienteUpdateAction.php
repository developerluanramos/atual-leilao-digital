<?php

namespace App\Actions\Cliente;

use App\DTO\Cliente\ClienteUpdateDTO;
use App\Models\Cliente;
use App\Models\Contato;
use App\Models\Propriedade;

class ClienteUpdateAction
{
    public function __construct() {}

    public function exec(ClienteUpdateDTO $dto)
    {
        $cliente = Cliente::where('uuid', $dto->uuid)
                            ->with('propriedades')
                            ->with('contatos')
                            ->firstOrfail();
        
        $cliente->update((array) $dto);

        Propriedade::destroy($cliente->propriedades()->pluck('id'));
        Contato::destroy($cliente->contatos()->pluck('id'));

        !is_null($dto->propriedades) ? $cliente->propriedades()->createMany($dto->propriedades) : null;
        !is_null($dto->contatos) ? $cliente->contatos()->createMany($dto->contatos) : null;

        return $cliente;
    }
}