<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\GadgetPDFResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GadgetPDFCollection extends ResourceCollection
{
	
    public $collects = GadgetPDFResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
