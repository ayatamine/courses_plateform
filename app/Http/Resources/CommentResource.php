<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'content'=>$this->content,
            'parent_id'=>$this->parent_id,
            'user'=>$this->commentable->full_name,
            'date'=>Carbon::parse($this->created_at)->locale('fr_FR')->isoFormat('LL'),
            'vote_number'=>$this->vote_number,
            'replies'=>$this->children()
        ];
    }
}
