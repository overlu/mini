<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

return [
    ['GET', 'welcome', 'IndexController@welcome'],
    ['ANY', '/', 'IndexController@index'],
    'group' => [
        ['GET', '/index', 'IndexController@index']
    ],
];
