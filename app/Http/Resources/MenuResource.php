<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>(string)$this->id,
            'attributes'=> [
                'name'=>$this->name,
                'description'=>$this->description,
                'image_path'=>$this->image_path,
                'price'=>$this->price
            ],
            'relationships' => [
                'business' => [
                    'id' => (string)$this->business->id,
                    'name' => $this->business->name,
                    'category' => $this->business->category,
                ],
                'reviews' => ReviewResource::collection($this->reviews),
                ]
            ];
    }
}

            