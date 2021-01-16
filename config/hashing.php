<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [

    /**
     * Default Hash Driver
     * Supported: "bcrypt", "argon", "argon2id"
     */
    'driver' => 'bcrypt',

    /**
     * Bcrypt Options
     */
    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 10),
    ],

    /**
     * Argon Options
     */
    'argon' => [
        'memory' => 1024,
        'threads' => 2,
        'time' => 2,
    ],

];
