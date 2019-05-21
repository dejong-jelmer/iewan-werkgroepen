<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('templates.partials.sidebar', function($view){
            $view->with('users', \App\User::get());
            $view->with('workgroups', \App\Workgroup::get());
        });
    }
}
