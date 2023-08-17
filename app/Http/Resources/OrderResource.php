<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id' => (string) $this->id,
            'attributes' => [
                'userid' => $this->user_id,
                'menuid' => $this->menuid,
                'OrderNumber' => $this->order_number,
                'status' => $this->status,
                'total_amount' => $this->total_amount,
                'delivery_address' => $this->delivery_address,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'contact_phone' => $this->contact_phone,
                'delivery_time' => $this->delivery_time,
                'created_at'=>$this->created_at,
                'note' => $this->note,
            ],
            'relationships' => [
                'cartitems' => CartResource::collection($this->cart),
            ]
        ];
    }
}
