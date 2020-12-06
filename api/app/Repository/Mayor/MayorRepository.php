<?php

namespace App\Repository\Mayor;


use App\Models\Mayor;
use App\Repository\BaseRepository;
use App\Repository\Mayor\MayorRepositoryInterface;

class MayorRepository extends BaseRepository implements MayorRepositoryInterface
{
    protected $model = Mayor::class;
}
