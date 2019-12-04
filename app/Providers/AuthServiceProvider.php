<?php

namespace App\Providers;

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

        // Gate policies
        // webgroep members are always allowed to pass this check, so return true for them
        Gate::before(function ($user, $ability) {
            if ($user->isWebgroepMember()) {
                return true;
            }
        });
        // workgroup gates
        Gate::define('intern', function($user){
            return $user->hasWorkgroupRole('intern');
        });

        Gate::define('aanname', function($user){
            return $user->hasWorkgroupRole('aanname');
        });
        // user profile gates
        Gate::define('edit-profile', function($user, $userProfile){
            return ($user->id == $userProfile->id) || $user->hasWorkgroupRole('intern');
        });

        Gate::define('delete-profile', function($user, $userProfile){
            return $user->id == $userProfile->id || $user->hasWorkgroupRole('intern');
        });

        // forum post gates
        Gate::define('edit-post', function($user, $post){
            return ($user->id == $post->user->id) || $user->hasWorkgroupRole('intern');
        });
        Gate::define('delete-post', function($user, $post){
            return ($user->id == $post->user->id) || $user->hasWorkgroupRole('intern');
        });
        Gate::define('close-post', function($user, $post){
            return $user->hasWorkgroupRole('intern');
        });

    }
}
