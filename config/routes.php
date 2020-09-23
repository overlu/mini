<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    'http' => [
        ['ANY', '/', 'IndexController@index'],
        'group' => [
            ['GET', '/index', 'IndexController@index']
        ],
    ],
    'ws' => [
        ['message', 'IndexController@index'],
    ]
];
