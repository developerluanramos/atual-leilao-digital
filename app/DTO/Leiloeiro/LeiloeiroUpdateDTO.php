<?php 

namespace App\DTO\Leiloeiro;

use App\Http\Requests\App\Leiloeiro\LeiloeiroUpdateRequest;

class LeiloeiroUpdateDTO
{
    public function __construct(
        public string $uuid,
        public string $nome,
        public string $email,
        public string $nascido_em
    ) { }

    public static function makeFromRequest(LeiloeiroUpdateRequest $request)
    {
        return new self(
            $request->uuid,
            $request->nome,
            $request->email,
            $request->nascido_em
        );
    }
}