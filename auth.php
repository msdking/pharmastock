<?php
return [
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],

        'gestionnaire' => [
            'driver' => 'session',
            'provider' => 'gestionnaires',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'gestionnaires' => [
            'driver' => 'eloquent',
            'model'  => App\Models\Gestionnaire::class,
        ],
    ],
]
;
