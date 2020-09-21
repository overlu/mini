<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    'http' => [
        // Tools
        ['POST', 'sendVerifyCode/{mobile:1[3456789]\d{9}}', 'ToolsController@sendVerifyCode'],

        //Auth
        ['GET', 'login', 'Auth\LoginController@login'],

        ['ANY', '/', 'IndexController@index'],
        'group' => [
            ['GET', '/index', 'IndexController@index']
        ],
    ],
    'ws' => [
        ['message', 'IndexController@index'],
    ]
];
