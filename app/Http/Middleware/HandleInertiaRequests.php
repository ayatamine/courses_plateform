<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Http\Request;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $site_settings = Setting::firstOrFail();
        $settings = json_decode($site_settings->settings);
        return array_merge(parent::share($request), [
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
            'site_settings' =>[
                "site_name"=>$settings->site_name,
                "contact_email"=>$settings->contact_email,
                "description"=>$settings->description,
                "phone_number"=>$settings->phone_number,
                "address"=>$settings->address,
                "facebook_link"=>$settings->facebook_link,
                "youtube_link"=>$settings->youtube_link,
                "instagram_link"=>$settings->instagram_link,
                "linkedin_link"=>$settings->linkedin_link ?? '',
                "twitter_link"=>$settings->twitter_link ?? '',
                "telegram_link"=>$settings->telegram_link ?? '',
            ] 
        ]);
    }
}
