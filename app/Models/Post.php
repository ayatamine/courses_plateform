<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded=[''];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function comments(){
        return $this->morphMany(Comment::class,'commentable')
        ->with('user:id,first_name,last_name')
        ->with('children')
        ->where('parent_id',null);
    }
    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
    //the admin or the instructor
    public function postable()
    {
        return $this->morphTo();
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
