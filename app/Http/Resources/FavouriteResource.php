<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\MenuResource;

class FavouriteResource extends JsonResource
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
                'user_id' => $this->user_id,
                'order_id' => $this->order_id,
                'menu_id' => $this->menu_id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'user' => new UserResource($this->whenLoaded('user')),
                'order' => new OrderResource($this->whenLoaded('order')),
                'menu' => new MenuResource($this->whenLoaded('menu')),
            ],
        'relationships' => [
            'User Id' => (string)$this->User->id,
            'User Name' => (string)$this->User->name,
            'Menu Id' => (string)$this->Menu->id,
            'Menu Name' => (string)$this->Menu->name,
            'Menu Description' => (string)$this->Menu->description,
            'Order Instructions' => (string)$this->order->specialinstructions,

        ]
    ]; 
    }
}
