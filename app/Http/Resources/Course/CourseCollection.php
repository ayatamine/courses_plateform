<?php

namespace App\Http\Resources\Course;

use App\Http\Resources\Course\PreviewCourse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CourseCollection extends ResourceCollection
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
            'data'=>PreviewCourse::collection($this->collection)
        ];
    }
}
