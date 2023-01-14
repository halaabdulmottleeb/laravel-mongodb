<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function create($data);

    public function findOneBy($filters = []);
}