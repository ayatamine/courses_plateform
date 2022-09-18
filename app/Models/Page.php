<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $fillable=['name','name_en','slug','content','content_en'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($query) {
              $query->attributes['slug'] = Str::slug($query->name_en);
        });
       
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}
