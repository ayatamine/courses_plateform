<?php

namespace App\Models;

use App\Models\Comment;
use App\Traits\FormatsDates;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory,FormatsDates;
    protected $guarded=[''];
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
