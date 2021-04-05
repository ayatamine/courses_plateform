<?php

namespace App\Models;

use App\Models\Tutorial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class YoutubeVideo extends Model
{
    use HasFactory;
    protected $fillable=['video_infos','tutorial_id'];
    public function tutorial(){
        return $this->belongsTo(Tutorial::class);
    }
}
