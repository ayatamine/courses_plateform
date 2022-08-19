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
        $settings = $site_settings->settings;
        $settings['logo'] = $site_settings->logo;
        $settings['logo_ar'] = $site_settings->logo_ar;
        return array_merge(parent::share($request), [
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
            'site_settings' =>$settings
        ]);
    }
}
