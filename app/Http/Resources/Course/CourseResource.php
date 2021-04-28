<?php

namespace App\Http\Resources\Course;

use Carbon\Carbon;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\SectionResource;
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
            'slug'=>$this->slug,
            'description'=>$this->description,
            'description_en'=>$this->description_en,
            'total_students'=>$this->students->count(),
            'total_ratings'=>$this->reviews->count() ?
            round($this->reviews->sum('value') / $this->reviews->count(),1)
            : 0,
            'total_reviews'=>$this->reviews->count(),
            'instructor'=>  [
                'name'=>$this->instructor->full_name,
                'bio'=>$this->instructor->bio,
                'photo'=>asset('storage/profiles/'.$this->instructor->photo)
            ],
            'price'=>$this->price,
            'preview_media'=>asset('storage/courses/'.$this->thumbnail),
            'categories'=>$this->categories,
            'tags'=>$this->tags,
            'date'=>Carbon::parse($this->created_at)->locale('fr_FR')->isoFormat('Do MMM YY'),
            'sections'=>SectionResource::collection($this->sections),
            'reviews'=>ReviewResource::collection($this->reviews)
        ];
    }
}
