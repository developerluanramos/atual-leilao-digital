<?php

namespace App\Actions\PlanoPagamento;

use App\Repositories\PlanoPagamento\PlanoPagamentoRepositoryInterface;

class PlanoPagamentoDeleteAction
{
    public function __construct(
        protected PlanoPagamentoRepositoryInterface $repository
    ) { }

    public function exec(string $uuid): void
    {
        $this->repository->delete($uuid);
    }
}