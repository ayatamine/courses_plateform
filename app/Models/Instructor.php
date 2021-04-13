<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Course;
use App\Models\Response;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Instructor extends Authenticatable
{
    use HasFactory,HasApiTokens, Notifiable;
    public function responses()
    {
        return $this->morphMany(Response::class, 'respondent');
    }
    public function posts()
    {
        return $this->morphMany(Post::class, 'postable');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name',
        'email',
        'password',
        'bio','photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function courses(){
        return $this->hasMany(Course::class);
    }
    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }
}