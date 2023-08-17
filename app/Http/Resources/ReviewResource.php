<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'id' => $this->id,
            'product_name' => $this->product_name,
            'product_description' => $this->product_description,
            'product_image' => $this->product_image,
            'rating' => [
                'value' => $this->rating_value,
                'best' => $this->rating_best,
                'worst' => $this->rating_worst,
            ],
            'author' => [
                'name' => $this->author_name,
            ],
            'date_published' => $this->date_published,
            'review_body' => $this->review_body,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'menu' => new MenuResource($this->whenLoaded('menu')),
            'customer' => new CustomerResource($this->whenLoaded('customer')),
        ];
    }
}
