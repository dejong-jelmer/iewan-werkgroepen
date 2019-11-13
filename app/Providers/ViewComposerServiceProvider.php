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
        // $files = \File::glob(base_path('resources/views').'/*');
        $files = [];
        foreach (\File::allFiles(base_path('resources/views')) as $file) {
            $files[] = \Str::before($file->getFilenameWithoutExtension(), '.');
        }
        view()->composer(\Arr::except($files, array_search('login', $files)), function($view){
            $view->with('users', \App\User::get());
            $view->with('workgroups', \App\Workgroup::get());
        });
    }
}
