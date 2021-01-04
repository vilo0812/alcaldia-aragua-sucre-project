<?php

namespace App\Repository\User;


use App\Models\User;
use App\Repository\BaseRepository;
use App\Repository\User\MayorRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model = User::class;
    
}
