<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[''];
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function tags(){
        return $this->hasManyThrough(
            'App\Models\Tag',
            'App\Models\PostTag',
            'tag_id',
            'id',
            'id',
            'post_id'
        );
    }
}
