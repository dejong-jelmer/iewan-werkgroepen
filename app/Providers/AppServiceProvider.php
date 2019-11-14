<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('boxes', function($expression) {
            $name = null;
            $args = null;
            if(Str::contains($expression, ',')) {
                list($name, $args) = explode(', ', $expression, 2);
            } else {
                $name = $expression;
            }
            $name = trim($name,"'");
            return "<?php echo resolve('\App\Http\Boxes\\{$name}')->loadView({$args}); ?>";
        });
    }
}
