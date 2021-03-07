<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowBookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'cover_image_url' => $this->cover_image_url,
            'price' => $this->price,
            'discount' => $this->discount,
            'authors' => AuthorResource::collection($this->authors)
        ];
    }
}
