<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '1894606873908398',
        'client_secret' => '0c1e8624e0d0396427f3b7773fc05636',
        'redirect' => 'facebook/callback',
    ],
    'google' => [
        'client_id' => '839748826030-drd0m9v2mh02aanelo2ces56mlfuo27h.apps.googleusercontent.com',
        'client_secret' => 'Owof9FFaRamkB7ZNNUTdu304',
        'redirect' => 'google/callback',
    ],

];
