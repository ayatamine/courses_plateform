<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable=['name','slug','content','content_en'];
    public function getRouteKeyName(){
        return 'slug';
    }
}
