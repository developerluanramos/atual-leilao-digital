<?php

namespace App\Repositories\Raca;

use App\DTO\Raca\RacaStoreDTO;
use App\Models\Raca;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;

class RacaEloquentRepository implements RacaRepositoryInterface
{
    protected $model;

    public function __construct(Raca $model)
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

    public function find(string $uuid): Raca
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

    public function new(RacaStoreDTO $dto): Raca
    {
        return $this->model->create((array) $dto);
    }
}
