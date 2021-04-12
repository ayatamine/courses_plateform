<?php

namespace App\Http\Resources\Posts;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'thumbnail'=>$this->thumbnail,
            'content'=>Str::limit($this->content,100) ,
            'content_en'=>Str::limit($this->content_en,100) ,
            'posted_at'=>Carbon::parse($this->created_at)->locale('fr_FR')->isoFormat('LL'),
            'author'=>$this->postable->full_name,
            'comments'=> CommentResource::collection($this->comments),
        ];
    }
}
