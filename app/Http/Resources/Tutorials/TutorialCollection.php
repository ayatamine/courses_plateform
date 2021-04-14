<?php

namespace App\Http\Resources\Tutorials;

use App\Http\Resources\Tutorials\TutorialResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TutorialCollection extends ResourceCollection
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
            'data'=>TutorialResource::collection($this->collection)
        ];
    }
}
