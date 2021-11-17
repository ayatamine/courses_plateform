<?php

namespace App\Http\Resources\Course;

use Carbon\Carbon;
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
            'total_duration'=>(count($this->sections) > 0 )?
              date('H:i', mktime(0,$this->videos_duration)) : 0,
            'thumbnail'=>asset('storage/courses/thumbnails/'.$this->thumbnail),
            'main_category'=>count($this->categories) ? $this->categories[0] : null,
            'date'=>Carbon::parse($this->created_at)->locale('fr_FR')->isoFormat('Do MMM YY'),
        ];
    }
}
