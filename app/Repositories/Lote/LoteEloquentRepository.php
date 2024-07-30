<?php

namespace App\Repositories\Lote;

use App\Models\Lote;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;

class LoteEloquentRepository implements LoteRepositoryInterface
{
    protected $model;

    public function __construct(Lote $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function totalQuantity() : int {
        return $this->model->count();
    }

    public function find(string $uuid): Lote
    {
        return $this->model
            ->with('promotor', 'leiloeiro', 'lotes')
            ->where('uuid', $uuid)->firstOrFail();
    }

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        $query = $this->model->query();

//        if(!is_null($filter)) {
//            $query->where("nome", "like", "%".$filter."%");
//            $query->orWhere("situacao", "like", "%".$filter."%");
//        }

        $query->orderBy('updated_at', 'desc');

        $result = $query->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function paginateByLeilaoUuid(int $page = 1, int $totalPerPage = 10, string $filter = null, $leilaoUuid): PaginationInterface
    {
        $query = $this->model->query()->with('condicao_pagamento', 'plano_pagamento');

//        if(!is_null($filter)) {
//            $query->where("nome", "like", "%".$filter."%");
//            $query->orWhere("situacao", "like", "%".$filter."%");
//        }

        $query->where('leilao_uuid', $leilaoUuid);
        $query->orderBy('updated_at', 'desc');

        $result = $query->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }
}
