<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    'http' => [
        ['ANY', '/', 'IndexController@index'],
        ['GET', '/welcome', 'IndexController@welcome'],
        'group' => [
            ['GET', '/index', 'IndexController@index']
        ],
    ],
    'ws' => [
        ['message/{id}', 'IndexController@message'],
    ]
];
