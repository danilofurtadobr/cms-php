<?php

namespace db;

use framework\db\Query;

use domain\user\UserInterface;
use domain\user\UserRepositoryInterface;

class UserDb implements UserRepositoryInterface
{
    public function load(UserInterface $user): UserInterface
    {
        $record = (new Query())
            ->select(['name'])
            ->from('users')
            ->where(['id' => $user->getId()])
            ->one()
        ;

        if (!$record) {
            throw new \Exception("The user '{{$user->getId()}}' not found.");
        }

        $user->setName($record['name']);
        return $user;
    }
}
