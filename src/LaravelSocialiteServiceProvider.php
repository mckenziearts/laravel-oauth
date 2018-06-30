<?php

namespace Mckenziearts\LaravelSocialite;

use Illuminate\Support\ServiceProvider;

class LaravelSocialiteServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/Lang', 'laravelsocialite');

        // Publishing assets.
        $this->publishes([
            __DIR__.'/../public/assets' => public_path('vendor/mckenziearts/laravelsocialite/assets'),
        ], 'laravelsocialite.assets');

        // Publishing the migrations.
        $this->publishes([
            __DIR__.'/../migrations/' => database_path('migrations'),
        ], 'laravelsocialite.migrations');

        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-socialite.php' => config_path('laravel-socialite.php'),
        ], 'laravelsocialite.config');

        // Publishing the translation files.
        $this->publishes([
            __DIR__.'/Lang' => resource_path('lang/vendor/mckenziearts'),
        ], 'laravelsocialite.views');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-socialite.php', 'laravel-socialite');

        /*
         * Register the Laravel/socialite service provider
         */
        $this->app->register(\Laravel\Socialite\SocialiteServiceProvider::class);

        // Register custom blade directive
        $this->app->register(\Mckenziearts\LaravelSocialite\Providers\BladeServiceProvider::class);

        /*
         * Create aliases for the dependency.
         */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Socialite', \Laravel\Socialite\Facades\Socialite::class);

        // Register the service the package provides.
        $this->app->singleton('laravelsocialite', function ($app) {
            return new LaravelSocialite;
        });
        // Create aliase for the package provider
        $loader->alias('LaravelSocialite', \Mckenziearts\LaravelSocialite\Facades\LaravelSocialite::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelsocialite'];
    }
}
