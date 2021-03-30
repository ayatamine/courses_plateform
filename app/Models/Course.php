<?php

namespace App\Models;

use App\Models\PlayList;
use App\Traits\FormatsDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory ,FormatsDates;
    protected $guarded=[''];
    public function playlists(){
        return $this->hasMany(PlayList::class);
    }
    public function user(){
        return $this->belongs(PlayList::class);
    }
    public function categories(){
        return $this->hasManyThrough(
            'App\Models\Category',
            'App\Models\CourseCategory',
            'category_id',
            'id',
            'id',
            'course_id'
        );
    }
}
