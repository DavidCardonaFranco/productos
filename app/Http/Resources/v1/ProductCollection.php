<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /* return parent::toArray($request); */
        return [
            'data' => $this->collection,
            'saludos' => [
                'mamita' => '1',
                'hemranita' => '2'
            ]
            /* 'links' => [
            'self' => 'link-value',
            ], */
        ];
    }
}
