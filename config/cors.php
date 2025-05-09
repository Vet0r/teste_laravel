<?php

return [
    'supports_credentials' => false,
    'paths' => ['api/*', 'storage/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,

];
