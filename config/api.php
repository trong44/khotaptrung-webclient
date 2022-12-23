<?php

return [
    'host' => env('API_URL'),
    'secret_key' => env('SECRET_CLIENT'),
    'url_media' => env('MEDIA_URL'),
    'client' => env('CLIENT'),
    'app_env' => env('APP_ENV'),
    'config_backup'=>env('CONFIG_BACKUP'),
    'key_config_backup'=>env('KEY_CONFIG_BACKUP'),
    'hash_secret_key_client'=>env('HASH_SECRET_KEY_CLIENT'),
];
