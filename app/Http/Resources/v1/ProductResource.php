<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /* return parent::toArray($request); */

        return [
            'id' => $this->id,
            'name' => $this->name,
            'value' => $this->price,
            'death_date' => $this->expiration,
            'provider' =>route('products.show',$this->owner->id)

        ];
    }
}
