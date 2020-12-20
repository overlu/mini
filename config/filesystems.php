<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [

    /**
     * Default Filesystem Disk
     */
    'default' => env('FILESYSTEM_DRIVER', 'local'),

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /**
     * Filesystem Disks
     * Supported Drivers: "local", "ftp", "sftp", "s3"
     */
    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'permissions' => [
                'file' => [
                    'public' => 0664,
                    'private' => 0600,
                ],
                'dir' => [
                    'public' => 0775,
                    'private' => 0700,
                ],
            ],
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

    /**
     * Symbolic Links
     * `storage:link`
     */
    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

    /**
     * default path
     */
    'path' => [
        'upload' => [
            'default' => upload_path(),
            'image' => upload_path('images'),
            'video' => upload_path('videos'),
            'avatar' => upload_path('avatars'),
        ],

        'font' => resource_path('fonts'),
    ],
];
