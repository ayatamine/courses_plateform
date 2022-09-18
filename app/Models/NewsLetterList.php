<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLetterList extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    protected $fillable=['email'];
    protected $hidden=['updated_at'];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->locale('fr_FR')->isoFormat('Do MMMM YYYY');
    }
}
