<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Question;
use App\Models\Tutorial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','name_en','slug'];

    public function courses(){
        return $this->morphedByMany(Course::class, 'skillable');
    }
    public function tutorials(){
        return $this->morphedByMany(Tutorial::class, 'skillable');
    }
    public function Question(){
        return $this->morphedByMany(Question::class, 'skillable');
    }
}