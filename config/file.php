<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    /**
     * default upload path
     */
    'upload_path' => [
        'default' => upload_path(),
        'image' => upload_path('images'),
        'video' => upload_path('videos'),
        'avatar' => upload_path('avatars'),
    ],
    /**
     * font resource path
     */
    'font_path' => resource_path('fonts'),
];