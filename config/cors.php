<?php

return [
    'paths' => ['api/*', 'sanctum/*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [
        'http://localhost:8080',
        'http://localhost:8081',
        'http://127.0.0.1:8080',
        'http://localhost:3000',
        'http://127.0.0.1:5173',
    ],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
