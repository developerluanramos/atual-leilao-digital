<?php

namespace App\DTO\Cliente;

use Illuminate\Http\Request;

class ClienteUpdateDTO
{
    public function __construct(
        public string $uuid,
        public string $nome,
        public string $cpf_cnpj,
        public string $cep,
        public string $endereco,
        public string $numero,
        public string $uf,
        public string $cidade,
        public string $complemento,
        public string $celular,
        public string $email,
        public string $site,
        public array|null $propriedades = [],
        public array|null $contatos = []
    ) { }

    public static function makeFromRequest(Request $request): self
    {
        return new self(
            $request->uuid,
            $request->nome,
            $request->cpf_cnpj,
            $request->cep,
            $request->endereco,
            $request->numero,
            $request->uf,
            $request->cidade,
            $request->complemento,
            $request->celular,
            $request->email,
            $request->site,
            json_decode($request->propriedades, true),
            json_decode($request->contatos, true)
        );
    }
}