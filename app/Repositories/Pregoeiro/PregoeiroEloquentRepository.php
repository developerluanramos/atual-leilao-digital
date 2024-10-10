<?php

namespace App\Repositories\Pregoeiro;

use App\Models\Pregoeiro;

class PregoeiroEloquentRepository implements PregoeiroRepositoryInterface
{
    protected $model;

    public function __construct(Pregoeiro $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }
}