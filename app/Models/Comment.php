<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use App\Models\Video;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 use App\Traits\Selfref;
class Comment extends Model
{
    use HasFactory ,Selfref;
    protected $fillable=['content','commentable_id','commentable_type',
    'vote_number','parent_id','user_type','user_id'];
    public function commentable(){
        return $this->morphTo();
    }
    public function user(){
       switch ($this->user_type) {
           case 'instructor':
                return $this->belongsTo(Instructor::class,'user_id','id')->withDefault();
               break;
           case 'admin':
               return $this->belongsTo(Admin::class,'user_id','id')->withDefault();
           default:
               return $this->belongsTo(User::class,'user_id','id')->withDefault();
               break;
       }
    }
    public function post(){
        return $this->belongsTo(Post::class)->withDefault();
    }
    public function video(){
        return $this->belongsTo(Video::class)->withDefault();
    }
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->locale('fr_FR')->isoFormat('LL');
    }
    protected $hidden=['updated_at'];
}
