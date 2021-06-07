<?php

namespace App\Providers;

use App\Models\User;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Models\MedicalNote::class => \App\Policies\MedicalNotePolicy::class,
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Implicitly grant "admin" role all permission checks using can()
        Gate::before(function (User $user, $ability) {
            return $user->isAdmin() ? true : null;
        });
        Passport::routes();
        $minutes = config('auth.token_expiration_time') * 24 * 60;
        Passport::tokensExpireIn(now()->addMinutes($minutes));
        Passport::refreshTokensExpireIn(now()->addDays(config('auth.refresh_token_expiration_time')));
        Passport::personalAccessTokensExpireIn(now()->addMinutes($minutes));
    }
}
