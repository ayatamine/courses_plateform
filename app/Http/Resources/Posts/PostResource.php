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
            'cover_image'=>str_replace('thumbnails/','',$this->thumbnail),
            'content'=>$this->content ,
            'content_en'=>$this->content_en,
            'content_description'=>htmlentities(Str::limit($this->content_en,100)),
            'posted_at'=>Carbon::parse($this->created_at)->locale('fr_FR')->isoFormat('LL'),
            'author'=>$this->postable->full_name,
            'author_info'=>$this->postable->select(['bio','photo'])->first(),
            'tags'=>$this->tags,
            'category'=>$this->category,
            'comments_count'=>$this->comments->count(),
            'keywords'=>$this->keywords
        ];
    }
}
