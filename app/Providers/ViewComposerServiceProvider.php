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
        $files = [];
        foreach (\File::allFiles(base_path('resources/views')) as $file) {
            // remove the .blade and get a clear array of filenames.
            $files[] = \Str::before($file->getFilenameWithoutExtension(), '.');
        }
        // pass users and workgroups to all views except login
        view()->composer(\Arr::except($files, array_search('login', $files)), function($view){
            $view->with('users', \App\User::get());
            $view->with('workgroups', \App\Workgroup::get());
        });
    }
}
