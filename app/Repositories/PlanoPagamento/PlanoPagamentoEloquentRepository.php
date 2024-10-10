<?php

namespace App\Repositories\PlanoPagamento;

use App\Models\PlanoPagamento;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;

class PlanoPagamentoEloquentRepository implements PlanoPagamentoRepositoryInterface
{
    protected $model;
    
    public function __construct(PlanoPagamento $model)
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

    public function find(string $uuid): PlanoPagamento
    {
        return $this->model->where('uuid', $uuid)->firstOrFail();
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

    public function delete(string $uuid): void
    {
        $planoPagamento = $this->find($uuid);
        $planoPagamento->delete();
    }
}
