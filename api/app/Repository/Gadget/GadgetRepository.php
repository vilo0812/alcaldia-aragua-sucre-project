<?php

namespace App\Repository\Gadget;



use App\Models\Gadget;
use App\Repository\BaseRepository;
use App\Repository\Gadget\GadgetRepositoryInterface;

class GadgetRepository extends BaseRepository implements GadgetRepositoryInterface
{
    protected $model = Gadget::class;
}