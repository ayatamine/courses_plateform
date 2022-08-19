<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tutorial extends Model
{
    use HasFactory;
    protected $fillable=['title','title_en','slug','description','description_en','thumbnail'];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function skills(){
        return $this->morphToMany(Skill::class,'skillable');
    }
    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
    public function videos(){
        return $this->hasMany(Video::class);
    }
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorable');
    }
    public function getThumbnailAttribute($value){
        return asset('storage/tutorials/'.$value);
    }
}
