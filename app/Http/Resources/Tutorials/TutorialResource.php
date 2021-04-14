<?php

namespace App\Http\Resources\Tutorials;

use Illuminate\Http\Resources\Json\JsonResource;

class TutorialResource extends JsonResource
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
                'title'=>$this->title,
                'title_en'=>$this->title_en,
                'slug'=>$this->slug,
                'description'=>$this->description,
                'description_en'=>$this->description_en,
                'thumbnail'=>$this->thumbnail
            ];
    }
}
