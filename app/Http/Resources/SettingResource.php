<?php

namespace App\Http\Resources;

use App\Models\Setting;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SettingResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $settings = Setting::first()->settings;
        return [
            'data'=>[
                "site_name"=>$settings->site_name,
                "contact_email"=>$settings->contact_email,
                "description"=>$settings->description,
                "phone_number"=>$settings->phone_number,
                "address"=>$settings->address,
                "logo"=>$settings->logo,
                "logo_ar"=>$settings->logo_ar,
                "facebook_link"=>$settings->facebook_link,
                "youtube_link"=>$settings->youtube_link,
                "instagram_link"=>$settings->instagram_link,
                "linkedin_link"=>$settings->linkedin_link ?? '',
                "twitter_link"=>$settings->twitter_link ?? '',
                "telegram_link"=>$settings->telegram_link ?? '',
            ]
        ];
    }
}
