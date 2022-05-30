<?php

namespace db;

use src\user\UserInterface;
use src\user\UserRepositoryInterface;

class UserDb implements UserRepositoryInterface
{
    private $query;

    public function __construct()
    {
        $this->query = (new Query());
    }

    public function load(UserInterface $user): bool
    {
        $records = $this->query
            ->select(['name'])
            ->from('users')
            ->where(['id' => $user->getId()])
            ->one()
        ;

        if (!$records) {
            return false;
        }

        $user->setName($records['name']);
        return true;
    }
}
