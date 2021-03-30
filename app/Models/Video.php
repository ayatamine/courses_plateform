<?php

namespace App\Models;

use App\Traits\FormatsDates;
use App\Models\PlayListSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory,FormatsDates;
    protected $guarded=[''];
    public function playlistsection(){
        return $this->belongsTo(PlayListSection::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
