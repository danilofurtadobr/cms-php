<?php

function routes()
{
    return [
        '/' => 'Home@index',
        '/user/create' => 'User@create'
    ];
}

function router()
{
    $uri = parse_url($_SERVER('REQUEST_URI]'), PHP_URL_PATH);
    var_dump($uri);die;
}
