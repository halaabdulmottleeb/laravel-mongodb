<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\QueryException;

class AbstractRepository implements RepositoryInterface
{
    
    public $model;

    public function create($data =[])
    {

        try {
            $item = $this->model->query()->create($data);
            return $item;
        } catch (\Illuminate\Database\QueryException $exception) {
            abort($exception);
        }

    }

    public function findOneBy($filters = [], $with = [])
    {
        try {
            return $this->model->query()->where($filters)->with($with)->first();
        } catch (\Illuminate\Database\QueryException $exception) {
            abort($exception);
        }
    }
}
