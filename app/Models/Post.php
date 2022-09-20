<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Image;
class Post extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory,SoftDeletes;

    protected $guarded=[];
    public function getRouteKeyName(){
        return 'slug';
    }
    
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($query) {
              $query->attributes['slug'] = Str::slug($query->title);
            //   $query->attributes['postable_id'] = auth('admin')->user()->id;
        });
        static::deleting(function($obj) {
            Storage::disk('local')->delete($obj->thumbnail);
        });
    }
    public function root_comments(){
        return $this->morphMany(Comment::class,'commentable')
        ->with('user:id,first_name,last_name,photo')
        ->with('children')
        ->where('parent_id',null);
    }
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }
    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
    //the admin or the instructor
    public function postable()
    {
        return $this->morphTo();
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function getThumbnailAttribute($value){
        return asset('posts/thumbnails/'.$value);
    }
    public function setThumbnailAttribute($value)
    {
        $filename ='';
            $extension = $value->getClientOriginalExtension();
            $filename  = 'post-thumbnail-' . time() . '.' . $extension;
            $imgFile = Image::make($value->getRealPath());
            $imgFile->backup();
            $thubmnail = $imgFile->resize(270, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            Storage::put('/posts/thumbnails/'.$filename,$thubmnail);
            $imgFile->reset();
            $postImage = $imgFile->resize(790,null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode();
            Storage::put('posts/'.$filename,$postImage);

            $this->attributes['thumbnail'] = $filename;

    }
    public function setWriterInputAttribute($value) {
        $this->attributes['postable_id'] = $value;
    }
    
    public function getWriterInputAttribute() {
        return $this['attributes']['postable_id'];
    }
    public function scopePublished($query){
        return $query->wherePublished(true);
    }
    
}
