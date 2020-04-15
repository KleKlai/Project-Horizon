<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('sys_admin_rights', function($user){
            return $user->hasRole('System Adminstrator');
        });

        Gate::define('clerk_rights', function($user){
            return $user->hasRole('Clerk');
        });

        Gate::define('cos_rights', function($user){
            return $user->hasRole('Chief of Staff');
        });

        Gate::define('lawyer_rights', function($user){
            return $user->hasRole('Lawyer');
        });

        Gate::define('admin_head_rights', function($user){
            return $user->hasRole('Admin Head');
        });
    }
}
