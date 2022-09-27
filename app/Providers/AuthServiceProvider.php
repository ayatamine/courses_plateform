<?php

namespace App\Providers;

use Carbon\Carbon;
// use Laravel\Passport\Passport;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Passport::routes();
        // Passport::tokensExpireIn(Carbon::now()->addDays(5));
        // Passport::refreshTokensExpireIn(Carbon::now()->addDays(5));
        // Passport::personalAccessTokensExpireIn(Carbon::now()->addHours(5*24));

        VerifyEmail::toMailUsing(function ($notifiable,$url) {
            $user = null;
            try{
                $email_verification_token = Str::of($url)->afterLast('verify/');
                $user = User::findorfail(Str::of($email_verification_token)->beforeLast('/'));
                $user->email_verification_code = rand(100000,999999);
                $user->save(); 
            }
            catch(Exception $ex){
                return response()->json(['message' => 'there is an error during sending verification code']);
            }
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->line('Your verification code is: '.$user?->email_verification_code)
                ->action('Verify Email Address',config('app.frontend_route').'/auth/verify');
        });
    }
}
