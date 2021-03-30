<?php

namespace App\Models;

use App\Models\Course;
use App\Models\PlayListSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayList extends Model
{
    use HasFactory;
    protected $fillable=['title','title_en'];
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function sections(){
        return $this->hasMany(PlayListSection::class);
    }
    public function tags(){
        return $this->hasManyThrough(
            'App\Models\Tag',
            'App\Models\PlayListTag',
            'tag_id',
            'id',
            'id',
            'playlist_id'
        );
    }
}
