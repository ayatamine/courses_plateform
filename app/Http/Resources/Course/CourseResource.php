<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'description'=>$this->description,
            'description_en'=>$this->description_en,
            'total_students'=>$this->students->count(),
            'total_ratings'=>$this->reviews->count() ?
            round($this->reviews->sum('value') / $this->reviews->count(),1)
            : 0,
            'total_reviews'=>$this->reviews->count(),
            'instructor'=>  [
                'name'=>$this->instructor->name,
                'bio'=>$this->instructor->bio,
                'photo'=>$this->instructor->photo
            ],
            'price'=>$this->price,
            'preview_media'=>$this->preview_media
        ];
    }
}
