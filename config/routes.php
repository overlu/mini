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
        ['message/{id}', 'IndexController@message'],
    ],

    /**
     * if http route not found, will be here
     * support `callable` or `controllerClass@method`
     */
//    'default' => 'IndexController@index',
];
