<?php

namespace App\Actions\Leilao\Lote;

use App\DTO\Leilao\Lote\LoteDeleteDTO;
use App\Models\Lote;

class LoteDeleteAction
{
    protected $model;

    public function __construct(Lote $model)
    {
        $this->model = $model;
    }

    public function exec(LoteDeleteDTO $dto)
    {
        $lote = $this->model->where('uuid', $dto->uuid)->firstOrFail();
        $lote->delete();
    }
}