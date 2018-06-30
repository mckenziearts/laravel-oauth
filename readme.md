<p align="center"><img src="https://pix.watch/KMqGF4/v0Yo15.png"></p>

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status](https://scrutinizer-ci.com/g/Mckenziearts/laravel-oauth/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Mckenziearts/laravel-oauth/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Mckenziearts/laravel-oauth/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mckenziearts/laravel-oauth/?branch=master)
[![StyleCI][ico-styleci]][link-styleci]

## Introduction

Social OAuth authentication for Laravel 5. Drivers: Facebook, Twitter, Google, LinkedIn, Github. This package use [Laravel Socialite](https://github.com/laravel/socialite).

## Installation

1. Include the package in your project using Composer

  ``` shell
  $ composer require mckenziearts/laravel-oauth
  ```

2. Add the service provider to your `config/app.php` providers array:

   **For Laravel 5.5.+ - you're done.**

  ```php
  Mckenziearts\LaravelOAuth\LaravelOAuthServiceProvider::class,
  ```
    
3. Publish the Vendor Assets files by running:

  ```shell
  php artisan vendor:publish --provider="Mckenziearts\LaravelOAuth\LaravelOAuthServiceProvider"
  ```

4. Now that we have published a few new files to our application we need to reload them with the following command:

  ```shell
  composer dump-autoload
  ```
  
## Configuration

When you published the vendor assets you added a new file inside of your `config` folder which is called `config/laravel-oauth.php`. This file contains a bunch of configuration you can use to configure your connexion using social networks.

First, you have to add your service like is defined on The official documentation of Socialite [available here](https://laravel.com/docs/5.6/socialite#configuration). Just setup your 
Oauth services for your application. Laravel/socialite is automatically installed by this package.
  
## Usage

1. Fisrt of all in the `config/laravel-oauth.php` file you must define the default users table name to simplify migrations. By default users table is used
  
  ```php
  'users' => [
      'table'   => 'users',
  ],
  ```
  
2. Secondly you must specify the providers to use for social login in the `providers` array. To active a provider set the value to `true`

  ```php
    'providers' => [
      'facebook'  => true,
      'google'    => true,
      'github'    => true,
    ],
  ```
  
The last configuration is to stylize the button by editing class name and add or remove icon

![](https://pix.watch/m3qMiw/Q8fKIi.png)

Next, if you may want to re-publish the laravel-oauth assets, config, and the migrations run the following command:

```
php artisan vendor:publish --tag=laravel-oauth.assets --force
php artisan vendor:publish --tag=laravel-oauth.config --force
php artisan vendor:publish --tag=laravel-oauth.migrations --force
```

3. Next to make sure you have the latest database schema run:

  ```
  php artisan migrate
  ```

4. Inside of your master.blade.php file include a header yield. Inside the head of your master or app.blade.php add the following:

  ```
  @yield('css')
  ```

5. Add the blade directive to your view where you want to display the socials buttons. The directive takes a parameter `login` to display the login text or `resgister` for the text related to the registration

  ```
  @socialite('login')
  ```

6. Add the style of the buttons by adding this to your view in the section in the `@yield('css')` who defined in your master layout

```
@section('css')
    <link href="{{ url('/vendor/mckenziearts/laravel-oauth/assets/css/socialite.css') }}" rel="stylesheet">
@endsection
```

7. In the `Auth\LoginController` of your application, add the `OAuthSocialite` trait:

  ```php
  namespace App\Http\Controllers\Auth;
  
  use App\Http\Controllers\Controller;
  use Illuminate\Foundation\Auth\AuthenticatesUsers;
  use Mckenziearts\LaravelOAuth\Traits\OAuthSocialite;
  
  class LoginController extends Controller
  {
      use OAuthSocialite;
      ..
  ```
With this feature you can overwrite the present methods on the trait if you want to customize them even more

8. Add this routes to your default web route file
  ```php
  Route::get('/auth/{provider}', 'Auth\LoginController@redirectToProvider');
  Route::get('/callback/{provider}', 'Auth\LoginController@handleProviderCallback');
  ```

## Change log

Please see the [changelog.md](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email monneylobe@gmail.com instead of using the issue tracker.

## Credits

- [Arthur Monney](https://www.twitter.com/monneyarthur)
- [Laravel Socialite](https://laravel.com/docs/5.6/socialite)

## License

MIT. Please see the [license.md](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mckenziearts/laravel-oauth.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mckenziearts/laravel-oauth.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/mckenziearts/laravel-oauth/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/139203549/shield

[link-packagist]: https://packagist.org/packages/mckenziearts/laravel-oauth
[link-downloads]: https://packagist.org/packages/mckenziearts/laravel-oauth
[link-travis]: https://travis-ci.org/Mckenziearts/laravel-oauth
[link-styleci]: https://styleci.io/repos/139203549
[link-author]: https://github.com/mckenziearts
[link-contributors]: ../../contributors]