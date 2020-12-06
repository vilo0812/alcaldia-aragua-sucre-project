<?php

namespace App\Repository\Departament;


use App\Models\Departament;
use App\Repository\BaseRepository;

class DepartamentRepository extends BaseRepository implements DepartamentRepositoryInterface
{
    protected $model = Departament::class;
}