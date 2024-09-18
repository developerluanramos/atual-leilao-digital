<?php

namespace App\Repositories\Leiloeiro;

use App\DTO\Leiloeiro\LeiloeiroStoreDTO;
use App\DTO\Leiloeiro\LeiloeiroUpdateDTO;
use App\Models\Leiloeiro;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;

class LeiloeiroEloquentRepository implements LeiloeiroRepositoryInterface
{
    protected $model;

    public function __construct(Leiloeiro $model)
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

    public function find(string $uuid): Leiloeiro
    {
        return $this->model
            // ->with('promotor', 'leiloeiro', 'lotes')
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

    public function new(LeiloeiroStoreDTO $dto): Leiloeiro
    {
        return $this->model->create((array) $dto);
    }

    public function update(LeiloeiroUpdateDTO $dto): Leiloeiro
    {
        $this->model->where("uuid", $dto->uuid)->update((array) $dto);

        return $this->find($dto->uuid);
    }
}
