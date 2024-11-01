<?php

namespace App\DTO\Leilao;

use App\Http\Requests\App\Leilao\LeilaoStoreRequest;
use App\Models\PrelanceConfig;

class LeilaoStoreDTO
{
    public function __construct(
        public string $descricao,
        public string $denominacao,
        public string $local,
        public string $cep,
        public string $uf,
        public string $cidade,
        public string $aberto_em,
        public string $fechado_em,
        public string $prelance_aberto_em,
        public string $prelance_fechado_em,
        public string $promotor_uuid,
        public string $leiloeiro_uuid,
        public string $pregoeiro_uuid,
        public array $configPreLance
    ) { }

    public static function makeFromRequest(LeilaoStoreRequest $request): self
    {
        $configPreLanceArray = json_decode($request->configPreLance);
        $configPreLance = [];

        foreach($configPreLanceArray as $config){
            $configPreLance[] = new PrelanceConfig((array) $config);
        }

        return new self(
            $request->descricao,
            $request->denominacao,
            $request->local,
            $request->cep,
            $request->uf,
            $request->cidade,
            $request->data_abertura,
            $request->data_fechamento,
            $request->prelance_aberto_em,
            $request->prelance_fechado_em,
            $request->promotor_uuid,
            $request->leiloeiro_uuid,
            $request->pregoeiro_uuid,
            $configPreLance
        );
    }
}