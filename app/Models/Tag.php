<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable=['title','title_en'];
    public function posts(){
        return $this->hasManyThrough(
            'App\Models\Post',
            'App\Models\PostTag',
            'post_id',
            'id',
            'id',
            'tag_id'
        );
    }
    public function playlists(){
        return $this->hasManyThrough(
            'App\Models\PlayList',
            'App\Models\PlayListTag',
            'playlist_id',
            'id',
            'id',
            'tag_id'
        );
    }
}
