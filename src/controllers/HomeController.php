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
        // var_dump('chegou no login');die;
        return ['view' => 'login'];
    }
}
