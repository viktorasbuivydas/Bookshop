<?php

namespace App\Http\Resources\User\Book;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $url = env('APP_url');
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->when($request->book, $this->description),
            'cover_image_url' => $url. '/storage/uploads/images/' .$this->cover_image_url,
            'price' => $this->price,
            'discount' => $this->discount,
            'authors' => $this->authors->implode('author', ', '),
            'genres' => $this->genres->implode('genre', ', '),
            'price_after_discount' => $this->priceAfterDiscount
        ];
    }
}
