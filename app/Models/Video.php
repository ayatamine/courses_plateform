<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Attachement;
use App\Models\PlayListSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;
    protected $guarded=[''];
    public function playlistsection(){
        return $this->belongsTo(PlayListSection::class)->withDefault();
    }
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }
    public function attachements()
    {
        return $this->morphMany(Attachement::class, 'attachable');
    }
}
