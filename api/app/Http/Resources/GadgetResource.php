<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GadgetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->departament_id ? $departament = $this->departament : $departament = null;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'status' => $this->status,
            'departament_id' => new DepartamentResource($departament)
        ];
    }
}