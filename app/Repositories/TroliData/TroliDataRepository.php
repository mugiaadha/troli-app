<?php

namespace App\Repositories\TroliData;

interface TroliDataRepository
{
    public function getAll();

    public function findById($id);
}
