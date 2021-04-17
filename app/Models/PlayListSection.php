<?php

namespace App\Models;

use App\Models\Video;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayListSection extends Model
{
    use HasFactory;
    protected $guarded=[''];
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function videos(){
        return $this->hasMany(Video::class,'section_id','id');
    }
    
}
