<?php

namespace App\Repositories\Promotor;

use App\DTO\Promotor\PromotorStoreDTO;
use App\DTO\Promotor\PromotorUpdateDTO;
use App\Models\Promotor;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;

class PromotorEloquentRepository implements PromotorRepositoryInterface
{
    protected $model;

    public function __construct(Promotor $model)
    {
        $this->model = $model;
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

    public function new(PromotorStoreDTO $dto): Promotor
    {
        return $this->model->create((array) $dto);
    }

    public function find(string $uuid): Promotor
    {
        return $this->model->where('uuid', $uuid)->firstOrFail();
    }

    public function update(PromotorUpdateDTO $dto): Promotor
    {
        $this->model->where("uuid", $dto->uuid)->update((array) $dto);

        return $this->find($dto->uuid);
    }
}