<?php

namespace App\Repositories\TroliData;

use App\Models\TroliData;
use App\Repositories\TroliData\TroliDataRepository;

class TroliDataRepositoryImplements implements TroliDataRepository
{
    private $model;
    public function __construct(TroliData $troliData)
    {
        $this->model = $troliData;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->where('id', $id)->first();
    }
}
