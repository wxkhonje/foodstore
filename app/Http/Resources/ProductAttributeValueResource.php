<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductAttributeValueResource extends JsonResource
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
                'product_id'=>$this->product_id,
                'attribute_id'=>$this->attribute_id,
                'value'=>$this->value
            ],
            'Product relationships' => [
                'id' => (string)$this->product->id,
                'Name' => (string)$this->product->name
            ],
            'Attribute relationships' => [
                'id' => (string)$this->attribute->id,
                'Name' => (string)$this->attribute->name,
                'Data_type' => (string)$this->attribute->data_type
            ]
            ];
    }
}