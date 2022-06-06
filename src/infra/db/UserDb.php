<?php

namespace src\infra\db;

use src\infra\framework\db\Query;

use src\domain\user\UserInterface;
use src\domain\user\UserRepositoryInterface;

class UserDb implements UserRepositoryInterface
{
    public function findByCpf(UserInterface $user): bool
    {
        $record = (new Query())
            ->select(['id', 'name', 'password'])
            ->from('users')
            ->where(['cpf' => $user->getCpf()->getNumber()])
            ->one()
        ;

        if (!$record) {
            return false;
        }

        $user
            ->setId($record['id'])
            ->setName($record['name'])
            ->setPassword($record['cpf'])
        ;

        return true;
    }
}
