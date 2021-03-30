<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatsDates;
class Comment extends Model
{
    use HasFactory,FormatsDates;
    protected $fillable=['content','user_id','vote_number'];
}
