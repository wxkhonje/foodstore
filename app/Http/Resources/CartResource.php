<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //$this->load('menu');

        return [
            'id'=>(string)$this->id,
            'attributes'=> [
                'user_id' => $this->user_id,
                'session_id' => $this->session_id,
                'menu_id' => $this->menu_id,
                'status' => $this->status,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ],
            'relationships' => [
                'USERID' => (string)$this->User->id,
                'UserName' => (string)$this->User->name,
                'MenuID' => (string)$this->menu->id,
                'MenuName' => (string)$this->menu->name,
                'OrderID' => (string)$this->order->id,
                'OrderNumber' => (string)$this->order->order_number
            ]
        ];
    }
}
