<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'cellnumber' => $this->cellnumber,
            'telephonenumber' => $this->telephonenumber,
            'emailaddress' => $this->emailaddress,
            'physicaladdress' => $this->physicaladdress,
            'contactaddress' => $this->contactaddress,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'deliveryaddress' => $this->deliveryaddress,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
