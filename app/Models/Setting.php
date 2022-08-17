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
    protected $appends=['logo','logo_ar'];
    public function getUpdatedAtAttribute($value){
          return Carbon::parse($value)->locale('fr_FR')->isoFormat('LL');
    }
    public function getSettingsAttribute($value){
        return json_decode($value);
    }
    public function getLogoAttribute(){
        $settings = json_decode($this->settings);
        return asset('storage/settings/'.$settings->logo);
    }
    public function getLogoArAttribute(){
        $settings = json_decode($this->settings);
        return asset('storage/settings/'.$settings->logo_ar);
    }
    protected $casts=[
        'settings' =>'array'
    ];
}
