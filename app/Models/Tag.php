<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $fillable=['title','title_en'];

    public function courses(){
        return $this->morphedByMany(Course::class, 'skillable');
    }
    public function posts(){
        return $this->morphedByMany(Post::class, 'skillable');
    }
}
