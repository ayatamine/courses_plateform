<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class PreviewCourse extends JsonResource
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
            'title'=>$this->title,
            'title_en'=>$this->title_en,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'description_en'=>$this->description_en,
            'lectures_count'=>$this->sections->count(),
            'total_duration'=>$this->sections->count(),
            'thumbnail'=>$this->thumbnail
        ];
    }
}
