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
        return ['view' => 'login'];
    }
}
