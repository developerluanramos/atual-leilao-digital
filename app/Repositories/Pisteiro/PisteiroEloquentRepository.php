<?php

namespace App\Repositories\Pisteiro;

use App\DTO\Pisteiro\PisteiroStoreDTO;
use App\Models\Pisteiro;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;

class PisteiroEloquentRepository implements PisteiroRepositoryInterface
{
    protected $model;

    public function __construct(Pisteiro $model)
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

    public function find(string $uuid): Pisteiro
    {
        return $this->model
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

    public function new(PisteiroStoreDTO $dto): Pisteiro
    {
        return $this->model->create((array) $dto);
    }
}
