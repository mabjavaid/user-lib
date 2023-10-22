<?php

return [
    'services' => [
        'url' => env('REQRES_URL', 'https://reqres.in/api/'),
        'request-timeout' => env('REQUEST_TIMEOUT', 300)
    ],

    'api_routes' => [
        'prefix'     => env('API_ROUTES_PREFIX', 'reqres/api'),
        'namespace'  => env('API_ROUTES_NAMESPACE', 'UserLib\Http\Controllers\Api\V1'),
    ],
];
