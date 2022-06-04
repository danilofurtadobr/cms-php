<?php

namespace src\controllers;

class HomeController
{
    public function index()
    {
        return [
            'view' => 'login',
            'data' => ['name' => 'Danilo']
        ];
    }
}
