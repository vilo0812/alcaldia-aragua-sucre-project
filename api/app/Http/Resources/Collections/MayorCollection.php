<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\MayorResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MayorCollection extends ResourceCollection
{
	
    public $collects = MayorResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
