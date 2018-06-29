# Laravel Socialite

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

## Introduction

:octocat: Social OAuth authentication for Laravel 5. Drivers: Facebook, Twitter, Google, LinkedIn, Github. This package use [https://github.com/laravel/socialite](Laravel Socialite).

## Installation

1. Include the package in your project using Composer

  ``` bash
  $ composer require mckenziearts/laravel-socialite
  ```

2. Add the service provider to your `config/app.php` providers array:

   **For Laravel 5.5.+ - you're done.**

  ```php
  Mckenziearts\LaravelSocialite\LaravelSocialiteServiceProvider::class,
  ```
    
3. Publish the Vendor Assets files by running:

  ```bash
  php artisan vendor:publish --provider="Mckenziearts\LaravelSocialite\LaravelSocialiteServiceProvider"
  ```

4. Now that we have published a few new files to our application we need to reload them with the following command:

  ```bash
  composer dump-autoload
  ```
  
  
## Usage


## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email monneylobe@gmail.com instead of using the issue tracker.

## Credits

- [Arthur Monney][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mckenziearts/laravel-socialite.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mckenziearts/laravel-socialite.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/mckenziearts/laravel-socialite/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/mckenziearts/laravel-socialite
[link-downloads]: https://packagist.org/packages/mckenziearts/laravel-socialite
[link-travis]: https://travis-ci.org/mckenziearts/laravel-socialite
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/mckenziearts
[link-contributors]: ../../contributors]