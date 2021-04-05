<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Traits\SelfReference;
class Comment extends Model
{
    use HasFactory ;
    protected $fillable=['content','commentable_id','commentable_type','vote_number','parent_id'];
    public function commentable(){
        return $this->morphTo();
    }
    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }
    public function post(){
        return $this->belongsTo(Post::class)->withDefault();
    }
    public function video(){
        return $this->belongsTo(Video::class)->withDefault();
    }
}
