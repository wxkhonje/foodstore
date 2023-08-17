<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
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
                'title'=>$this->title,
                'image'=>$this->image,
                'url'=>$this->url,
                'description'=>$this->description,
                'notes'=>$this->notes
            ]
        ]; 
    }
}
