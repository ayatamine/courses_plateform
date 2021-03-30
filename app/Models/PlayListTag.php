<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayListTag extends Model
{
    use HasFactory;
    protected $fillable=['playlist_id','tag_id'];
}
