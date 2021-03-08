<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Admin\Book\ShowResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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
            'admin_message' => $this->admin_message,
            'book' => ShowResource::collection($this->book)
        ];
    }
}
