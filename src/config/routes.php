<?php

return [
    'GET' => [
        '/' => 'HomeController@login',
        '/login' => 'HomeController@login',
        '/logout' => 'AuthController@logout',
        '/user/create' => 'UserController@create',
        '/user/[a-z0-9]' => 'UserController@index',
        '/user/[0-9]' => 'UserController@create',
        '/user/[0-9]+/name/[a-z]+' => 'UserController@show',
    ],
    'POST' => [
        '/login' => 'AuthController@login',
    ],
];
