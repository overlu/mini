<?php
/**
 * This file is part of Reel.
 * @auth lupeng
 * @date 2024/7/23 下午2:55
 */
declare(strict_types=1);

return [
    'default' => env('CDN_DEFAULT_DRIVER', 'cloudfront'),
    'drivers' => [
        'cloudfront' => [
            'default_expiration_time_in_seconds' => 3600,
            'private_key_path' => env('CLOUDFRONT_PRIVATE_KEY_PATH', storage_path('cdn_private_key.pem')),
            'key_pair_id' => env('CLOUDFRONT_KEY_PAIR_ID', 'KNKXFYWU8FL7S'),
            'version' => env('CLOUDFRONT_API_VERSION', 'latest'),
        ]
    ]
];

