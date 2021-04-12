<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[''];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }
    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
    //the admin or the instructor
    public function postable()
    {
        return $this->morphTo();
    }
}
