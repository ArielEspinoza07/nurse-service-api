<?php

namespace App\Providers;

use App\Models;
use App\Policies;
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
        Models\MedicalNote::class     => Policies\MedicalNotePolicy::class,
        Models\MedicalNoteType::class => Policies\MedicalNoteTypePolicy::class,
        Models\Permission::class      => Policies\PermissionPolicy::class,
        Models\Role::class            => Policies\RolePolicy::class,
        Models\User::class            => Policies\UserPolicy::class,
        Models\WorkShiftTime::class   => Policies\WorkShiftTimePolicy::class,
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
        Gate::before(function (Models\User $user, $ability) {
            return $user->isAdmin() ? true : null;
        });
        Passport::routes();
        $minutes = config('auth.token_expiration_time') * 24 * 60;
        Passport::tokensExpireIn(now()->addMinutes($minutes));
        Passport::refreshTokensExpireIn(now()->addDays(config('auth.refresh_token_expiration_time')));
        Passport::personalAccessTokensExpireIn(now()->addMinutes($minutes));
    }
}
