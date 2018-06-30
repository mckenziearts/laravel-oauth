<?php

return [
    /*
    |--------------------------------------------------------------------------
    | User config
    |--------------------------------------------------------------------------
    |
    | Here you can specify socialite user configs
    | *table* : The users tables in your application
    |
    */

    'users' => [
        'table'   => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Socialite provider
    |--------------------------------------------------------------------------
    |
    | Here you can specify the specific provider you need for your application
    | Supported: "facebook", "google", "github"
    |
    */

    'providers' => [
        'facebook'  => true,
        'google'    => true,
        'github'    => true,

        //'twitter'   => true,
        //'linkedin'  => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Socialite Buttons styles
    |--------------------------------------------------------------------------
    |
    | Socialite buttons default style.
    | To use your own css classes, you can modify the following classes
    | and replace with yours. By default Boostrap buttons class are used
    |
    |
    | example:
    | 'buttons' => [
    |     'class' => 'btn btn-social'
    |     'icon'  => false
    |  ]
    |
    | 'buttons' => [
    |     'class' => 'btn btn-social btn-block'
    |     'icon'  => true
    |  ]
    |
    */

    'buttons' => [
        'class' => 'btn btn-social',
        'icon'  => true,
    ],

];
