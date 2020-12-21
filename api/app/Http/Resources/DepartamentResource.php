<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartamentResource extends JsonResource 
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->mayor_id ? $mayor = $this->mayor : $mayor = null;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mayor_id' => new MayorResource($mayor)
        ];
    }
}
