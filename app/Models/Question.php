<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable=['title','content','user_id','slug'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorable');
    }
    public function responses(){
        return $this->hasMany(Response::class);
    }
}
