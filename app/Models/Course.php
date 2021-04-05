<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Category;
use App\Models\PlayList;
use App\Models\Promotion;
use App\Models\PlayListSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $guarded=[''];
    public function playlists(){
        return $this->hasMany(PlayList::class)->withDefault();
    }
    public function author(){
        return $this->belongs(PlayList::class)->withDefault();
    }
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorable');
    }
    // public function categories(){
    //     return $this->hasManyThrough(
    //         'App\Models\Category',
    //         'App\Models\CourseCategory',
    //         'category_id',
    //         'id',
    //         'id',
    //         'course_id'
    //     );
    // }
    public function students(){
        return $this->hasManyThrough(
            'App\Models\User',
            'App\Models\CourseEnrollemnt',
            'user_id',
            'id',
            'id',
            'course_id'
        );
    }
    public function promotions(){
        return $this->hasMany(Promotion::class)->withDefault();
    }
    public function sections(){
        return $this->hasMany(PlayListSection::class);
    }
    public function skills(){
        return $this->morphToMany(Skill::class,'skillable');
    }
    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
}
