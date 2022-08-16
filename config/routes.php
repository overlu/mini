<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    /**
     * http server route
     */
    'http' => [
        ['ANY', '/', 'IndexController@index'],
        ['GET', '/welcome', 'IndexController@welcome'],

        /*'group' => [
            ['GET', '/index', 'IndexController@index']
        ],*/
    ],

    /**
     * websocket server route
     */
    'ws' => [
        ['/{id}', 'IndexController'],
    ],

    /**
     * if http route not found, will be here
     * support `callable` or `controllerClass@method`
     */
//    'default' => 'IndexController@index',

    'cors' => [
        'enable' => false,
        'access_control_allow_origin' => env('ACCESS_CONTROL_ALLOW_ORIGIN', '*'),
        'access-control_allow_methods' => env('ACCESS_CONTROL_ALLOW_METHODS', 'GET, POST, DELETE, PUT, PATCH, OPTIONS')
    ]
];
