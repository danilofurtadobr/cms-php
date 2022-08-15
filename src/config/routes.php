<?php

return [
    'GET' => [
        '/SCC/public/' => 'DayRecordsController@index',
        '/SCC/public/login' => 'HomeController@login',
        '/SCC/public/logout' => 'AuthController@logout',
        '/user/create' => 'UserController@create',
        '/user/[a-z0-9]' => 'UserController@index',
        '/user/[0-9]' => 'UserController@create',
        '/user/[0-9]+/name/[a-z]+' => 'UserController@show',
    ],
    'POST' => [
        '/SCC/public/login' => 'AuthController@login',
        // '/api/login' => 'AuthController@apiLogin',
    ],
];
