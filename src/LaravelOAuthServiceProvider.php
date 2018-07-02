<?php

namespace Mckenziearts\LaravelOAuth;

use Illuminate\Support\ServiceProvider;
use Mckenziearts\LaravelOAuth\Providers\InstagramProvider;

class LaravelOAuthServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/Lang', 'laravel-oauth');

        $this->publishes([
            __DIR__.'/../public/assets' => public_path('vendor/mckenziearts/laravel-oauth/assets'),
        ], 'laravel-oauth.assets');
        $this->publishes([
            __DIR__.'/../migrations/' => database_path('migrations'),
        ], 'laravel-oauth.migrations');
        $this->publishes([
            __DIR__.'/../config/laravel-oauth.php' => config_path('laravel-oauth.php'),
        ], 'laravel-oauth.config');
        $this->publishes([
            __DIR__.'/Lang' => resource_path('lang/vendor/mckenziearts'),
        ], 'laravel-oauth.views');

        // Boot all new OAuth 2 Provider added to Socialite
        $this->bootInstagramSocialite();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-oauth.php', 'laravel-oauth');

        /*
         * Register the Laravel/socialite service provider
         */
        $this->app->register(\Laravel\Socialite\SocialiteServiceProvider::class);

        // Register custom blade directive
        $this->app->register(\Mckenziearts\LaravelOAuth\Providers\BladeServiceProvider::class);

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
        $loader->alias('LaravelSocialite', \Mckenziearts\LaravelOAuth\Facades\LaravelSocialite::class);
    }

    /**
     *
     * Add Instagram to Socialite
     */
    private function bootInstagramSocialite()
    {
        $socialite = $this->app->make(\Laravel\Socialite\Contracts\Factory::class);
        $socialite->extend(
            'instagram',
            function ($app) use ($socialite) {
                $config = $app['config']['services.instagram'];
                return $socialite->buildProvider(InstagramProvider::class, $config);
            }
        );
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
