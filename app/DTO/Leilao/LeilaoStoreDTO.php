<?php

namespace App\DTO\Leilao;

use App\Http\Requests\App\Leilao\LeilaoStoreRequest;
use App\Models\PrelanceConfig;
use Illuminate\Support\Facades\Date;

class LeilaoStoreDTO
{
    public function __construct(
        public string $descricao,
        public string $denominacao,
        public string $local,
        public string $cep,
        public string $uf,
        public string $cidade,
        public Date $leilaoAbertoEm,
        public Date $leilaoFechadoEm,
        public Date $preLanceAbertoEm,
        public Date $preLanceFechadoEm,
        public string $promotorUuid,
        public string $leiloeiroUuid,
        public string $pregoeiroUuid,
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
            $request->dataAbertura,
            $request->dataFechamento,
            $request->promotor_uuid,
            $request->leiloeiro_uuid,
            $request->pregoeiro_uuid,
            $configPreLance
        );
    }
}