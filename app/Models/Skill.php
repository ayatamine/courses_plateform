<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Video;
use App\Models\Course;
use App\Models\Tutorial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;
    protected $guarded=[''];
    public function courses(){
        return $this->morphedByMany(Course::class, 'skillable');
    }
    public function tutorials(){
        return $this->morphedByMany(Tutorial::class, 'skillable');
    }
    public function video(){
        return $this->morphedByMany(Video::class, 'skillable');
    }
}
