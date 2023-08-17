<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
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
                'category'=>$this->category,
                'category_id'=>$this->category_id,
                'contactperson'=>$this->contactperson,
                'email'=>$this->email,
                'cellnumber'=>$this->cellnumber
            ],
            'relationships' => [
                'id' => (string)$this->User->id,
                'name' => (string)$this->User->name

            ]
        ]; 
    }
}