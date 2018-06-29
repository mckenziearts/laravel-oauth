<?php

namespace Mckenziearts\LaravelSocialite\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('socialite', function ($expression) {
            // Check user needs :login or :register text
            return "<?php echo LaravelSocialite::socialiteButtons($expression); ?>";
        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
