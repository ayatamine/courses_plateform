<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Traits\SelfReference;
class Comment extends Model
{
    use HasFactory ;
    protected $fillable=['content','user_id','vote_number','parent_id'];
}
