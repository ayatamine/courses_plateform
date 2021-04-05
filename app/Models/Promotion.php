<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable=['code','discount_value','course_id'];
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
