<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void

    {
        $this->registerPolicies();

        Gate::define('admin-manages', function (User $user) {
            return $user->role_id == 1;
        });
        Gate::define('author-manages', function (User $user) {
            return $user->role_id == 2;
        });
        Gate::define('user-manages', function (User $user) {
            return $user->role_id == 3;
        });
    }
}
