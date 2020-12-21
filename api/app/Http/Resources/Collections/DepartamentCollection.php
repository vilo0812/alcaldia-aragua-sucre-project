<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\DepartamentResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DepartamentCollection extends ResourceCollection
{
	
    public $collects = DepartamentResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
