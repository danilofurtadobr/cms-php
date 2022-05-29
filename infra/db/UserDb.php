<?php

namespace db;

use src\user\UserRepositoryInterface;

class UserDb implements UserRepositoryInterface
{
    private $query;

    public function __construct()
    {
        $query = new Query();
    }
}
