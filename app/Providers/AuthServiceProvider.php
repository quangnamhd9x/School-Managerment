<?php

namespace App\Providers;

use App\Models\RoleConstants;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-caa', function ($user) {
            return $user->role_id == RoleConstants::ROLE_ADMIN
                || $user->role_id == RoleConstants::ROLE_CAA;
        });

        Gate::define('admin', function ($user) {
            return $user->role_id == RoleConstants::ROLE_ADMIN;
        });

        Gate::define('admin-caa-tc', function ($user) {
            return $user->role_id == RoleConstants::ROLE_ADMIN
                || $user->role_id == RoleConstants::ROLE_CAA
                || $user->role_id == RoleConstants::ROLE_TEACHER;
        });
    }
}
