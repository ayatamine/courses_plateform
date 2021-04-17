<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Skill;
use App\Models\Review;
use App\Models\Category;
use App\Models\PlayList;
use App\Models\Promotion;
use App\Models\Instructor;
use App\Models\PlayListSection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $guarded=[''];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function playlists(){
        return $this->hasMany(PlayList::class)->withDefault();
    }
    public function instructor(){
        return $this->belongsTo(Instructor::class)->withDefault();
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
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function getVideosDurationAttribute($value)
    {
        $section_id = count($this->sections) ? $this->sections[0]->id : 1;
        return DB::table('videos')
        ->where('section_id',$section_id)
        ->sum('duration');
    }
    public function getPreviewMediaAttribute($value){
         return (count($this->sections) && (count($this->sections[0]->videos)))
                ? $this->sections[0]->videos[0]->link
                : $this->thumbnail;
    }
    protected $appends = ['preview_media','videos_duration'];
}
