<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GadgetPDFResource extends JsonResource
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
        $this->status == 1 ? $status = 'incorporado' : $status = 'desincorporado';

        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'inc' => $status,
            'departament' => $departament
        ];
    }
}