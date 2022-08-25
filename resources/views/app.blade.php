<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
        <meta inertia http-equiv="X-UA-Compatible" content="ie=edge" />
        
        <title inertia>{{ config('app.name','coursatbarmaja') }}</title>


        <meta inertia head-key="description" name="description" content="{{env('META_DESCRIPTION')}}">
        <meta inertia head-key="keyword" name="keyword" content="{{env('META_KEYWORDS')}}">
        <meta inertia head-key="og-title"  property="og:title" content="{{ config('app.name', 'coursatbarmaja') }}">
        <meta inertia head-key="og:image" property="og:image" content="{{ env('META_IMAGE') }}">
        <meta inertia head-key="og:description" property="og:description" content="{{ env('META_OG_DESCRIPTION') }}">
        <meta inertia head-key="og:facebook-domain-verification" property="facebook-domain-verification" content="{{ env('FACEBOOK_DOMAIN_VERFICATION') }}">
        <meta inertia head-key="og:site_name" property="og:site_name" content="{{ config('app.name', 'coursatbarmaja') }}">
        <meta inertia head-key="og:twitter_title" property="twitter:image" content="">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{asset('js/custom-script.js')}}" type="module"  defer></script>
        @inertiaHead
    </head>
    <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
        @inertia

        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
        @endenv
     
    </body>
</html>
