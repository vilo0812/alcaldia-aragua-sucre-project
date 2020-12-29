<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\GadgetResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GadgetCollection extends ResourceCollection
{
	
    public $collects = GadgetResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
