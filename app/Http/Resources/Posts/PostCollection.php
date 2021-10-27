<?php

namespace App\Http\Resources\Posts;

use App\Http\Resources\Posts\PreviewPost;
use Illuminate\Http\Resources\Json\ResourceCollection;

class
PostCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'=>PreviewPost::collection($this->collection)
        ];
    }
}
