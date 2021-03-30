<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','name_en','slug'];
    public function courses(){
        return $this->hasManyThrough(
            'App\Models\Course',
            'App\Models\CourseCategory',
            'course_id',
            'id',
            'id',
            'category_id'
        );
    }
}
