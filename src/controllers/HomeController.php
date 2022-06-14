<?php

namespace src\controllers;

class HomeController
{
    public function index()
    {
        return [
            'view' => 'dashboard',
            'data' => ['name' => 'Danilo']
        ];
    }

    public function login()
    {
        var_dump('view login no homecontroller');die;
        return ['view' => 'login'];
    }
}
