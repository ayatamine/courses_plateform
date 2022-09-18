<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Course;
use App\Models\Tutorial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $fillable=['title','title_en'];

    public function courses(){
        return $this->morphedByMany(Course::class, 'taggable');
    }
    public function tutorials(){
        return $this->morphedByMany(Tutorial::class, 'taggable');
    }
    public function posts(){
        return $this->morphedByMany(Post::class, 'taggable');
    }
    protected $hidden=['created_at','updated_at'];
}
