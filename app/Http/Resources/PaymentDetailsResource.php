<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentDetailsResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'payment_method' => $this->payment_method,
            'card_number' => $this->card_number,
            'expirydate' => $this->expirydate,
            'ussdMNO' => $this->ussdMNO,
            'ussdmobilenumber' => $this->ussdmobilenumber,
            'delivery_address' => $this->delivery_address,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
