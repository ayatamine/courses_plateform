<?php

namespace App\Http\Resources\Tutorials;

use Carbon\Carbon;
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
                'thumbnail'=>asset('storage/tutorials/thumbnails/'.$this->thumbnail),
                'main_category'=>count($this->categories) ? $this->categories[0] : null,
                'date'=>Carbon::parse($this->created_at)->locale('fr_FR')->isoFormat('Do MMM YY'),
                'tags'=>$this->tags
            ];
    }
}
