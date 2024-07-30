<?php

namespace App\Repositories\Cargo;

use App\DTO\Cargo\CargoStoreDTO;
use App\DTO\Cargo\CargoUpdateDTO;
use App\Enums\SituacaoCargoEnum;
use App\Models\Cargo;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;

class CargoEloquentRepository implements CargoRepositoryInterface
{
    protected $model;

    public function __construct(Cargo $model)
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

    public function find(string $uuid): Cargo
    {
        return $this->model
            ->with('servidores')
            ->where('uuid', $uuid)->first();
    }

    public function new(CargoStoreDTO $dto): Cargo
    {
        return $this->model->create((array) $dto);
    }

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        $query = $this->model->query();

        if(!is_null($filter)) {
            $query->where("nome", "like", "%".$filter."%");
            $query->orWhere("situacao", "like", "%".$filter."%");
        }

        $query->orderBy('updated_at', 'desc');

        $result = $query->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function update(CargoUpdateDTO $dto): Cargo
    {
        $this->model->where("uuid", $dto->uuid)->update((array)$dto);

        return $this->find($dto->uuid);
    }

    public function ativos()
    {
        return $this->model->where('situacao', SituacaoCargoEnum::ATIVO)
        ->orderBy('nome', 'asc')
        ->get();
    }
}
