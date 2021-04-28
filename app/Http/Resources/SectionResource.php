<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'title'=>$this->title,
            'title_en'=>$this->title_en,
            'videos'=>$this->videos->map(function($v){
                return [
                    'title'=>$v->title,
                    'title_en'=>$v->title_en,
                    'duration'=>$v->duration,
                    'link'=>$v->link
                ];
            })
        ];
    }
}
