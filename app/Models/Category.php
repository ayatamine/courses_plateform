<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Course;
use App\Models\Question;
use App\Models\Tutorial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','name_en','slug'];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function courses(){
        return $this->morphedByMany(Course::class, 'categorable');
    }
    public function tutorials(){
        return $this->morphedByMany(Tutorial::class, 'categorable');
    }
    public function Question(){
        return $this->morphedByMany(Question::class, 'categorable');
    }
    public function articles(){
        return $this->hasMany(Post::class,'category_id');
    }
    protected $hidden=['created_at','updated_at'];
}
