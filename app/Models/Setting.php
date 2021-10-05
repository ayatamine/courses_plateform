<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Setting extends Model
{
    use HasFactory;
    protected $fillable=['settings'];
    protected $hidden=['created_at'];
    public function getUpdatedAtAttribute($value){
          return Carbon::parse($value)->locale('fr_FR')->isoFormat('LL');
    }
    public function getSettingsAttribute($value){
        return json_decode($value);
    }
}
